class fcms.model.Tags
{
    var treeLevels, tagData, dispatchEvent;
    function Tags()
    {
        treeLevels = [];
        mx.events.EventDispatcher.initialize(this);
    } // End of the function
    function load(path)
    {
        var _loc4 = new fcms.model.Loader();
        var _loc3 = new fcms.Query();
        _loc3.addFilter("$DOCTYPE", "=", "_TAG");
        _loc3.addReturnRelation("child_of");
        _loc3.addReturnRelation("tagged_with", true, true);
        _loc3.__set__limit(9999);
        _loc4.addEventListener("loadComplete", this);
        _loc4.addEventListener("error", _global._fCMS.master);
        _loc4.backendPath = path;
        _loc4.load(_loc3.getXML(), this);
    } // End of the function
    function loadComplete(eo)
    {
        tagData = [];
        var _loc4;
        for (var _loc9 in eo.data)
        {
            _loc4 = {id: eo.data[_loc9].id, label: eo.data[_loc9].content.title, tip: eo.data[_loc9].content.tip, count: eo.data[_loc9].tagCount};
            for (var _loc2 in eo.data[_loc9].relations)
            {
                if (eo.data[_loc9].relations[_loc2].name == "child_of")
                {
                    if (!_loc4.parent)
                    {
                        _loc4.parent = [];
                    } // end if
                    _loc4.parent.push(eo.data[_loc9].relations[_loc2].id);
                } // end if
            } // end of for...in
            tagData[_loc4.id] = _loc4;
        } // end of for...in
        for (var _loc9 in tagData)
        {
            if (tagData[_loc9].parent != undefined)
            {
                for (var _loc2 = 0; _loc2 < tagData[_loc9].parent.length; ++_loc2)
                {
                    if (!tagData[tagData[_loc9].parent[_loc2]].children)
                    {
                        tagData[tagData[_loc9].parent[_loc2]].children = [];
                    } // end if
                    tagData[tagData[_loc9].parent[_loc2]].children.push(parseInt(_loc9));
                } // end of for
            } // end if
        } // end of for...in
        this.parseLevels();
        this.dispatchEvent({type: "tagsLoaded", data: tagData});
    } // End of the function
    function getTagByLabel(namea, retTree)
    {
        var _loc5;
        var _loc3;
        for (var _loc2 = 0; _loc2 < namea.length; ++_loc2)
        {
            _loc5 = namea[_loc2];
            _loc3 = false;
            for (var _loc7 in treeLevels[_loc2])
            {
                if (_loc5 == treeLevels[_loc2][_loc7].label)
                {
                    if (_loc2 == namea.length - 1)
                    {
                        if (retTree)
                        {
                            return (this.getTagTree(treeLevels[_loc2][_loc7].id));
                        } // end if
                        return (treeLevels[_loc2][_loc7]);
                    } // end if
                    _loc3 = true;
                    break;
                } // end if
            } // end of for...in
            if (!_loc3)
            {
                return (false);
            } // end if
        } // end of for
    } // End of the function
    function getParentTree(id)
    {
        var _loc2 = [tagData[id]];
        for (var _loc3 = 0; _loc2[_loc3].parent != undefined; ++_loc3)
        {
            _loc2.push(tagData[_loc2[_loc3].parent[0]]);
        } // end of for
        return (_loc2);
    } // End of the function
    function getTagTree(id, notFirst)
    {
        if (id == 0)
        {
            return ([]);
        } // end if
        var _loc3 = tagData[id];
        if (!notFirst)
        {
            _loc3 = gr.ground.utils.ObjectTools.copy(_loc3);
            delete _loc3.parent;
        } // end if
        var _loc4 = [];
        _loc4[id] = _loc3;
        var _loc2;
        for (var _loc6 in _loc3.children)
        {
            _loc2 = this.getTagTree(_loc3.children[_loc6], true);
            for (var _loc5 in _loc2)
            {
                _loc4[_loc5] = _loc2[_loc5];
            } // end of for...in
        } // end of for...in
        return (_loc4);
    } // End of the function
    function getTag(id)
    {
        return (tagData[id]);
    } // End of the function
    function parseLevels(lev)
    {
        if (!lev)
        {
            lev = 0;
        } // end if
        var _loc3;
        for (var _loc6 in tagData)
        {
            if (!treeLevels[lev])
            {
                treeLevels[lev] = [];
            } // end if
            if (lev == 0)
            {
                if (tagData[_loc6].parent == undefined)
                {
                    treeLevels[0].push(tagData[_loc6]);
                } // end if
                continue;
            } // end if
            for (var _loc5 in treeLevels[lev - 1])
            {
                _loc3 = treeLevels[lev - 1][_loc5].children;
                for (var _loc4 in _loc3)
                {
                    if (_loc3[_loc4] == tagData[_loc6].id)
                    {
                        treeLevels[lev].push(tagData[_loc6]);
                    } // end if
                } // end of for...in
            } // end of for...in
        } // end of for...in
        if (treeLevels[lev].length > 0)
        {
            this.parseLevels(lev + 1);
        } // end if
    } // End of the function
} // End of Class
