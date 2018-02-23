class fcms.Query
{
    var __limit, __get__limit, __get__page, __get__totaldocs, __set__page, __totaldocs, __page, __sort, __get__sort, __fields, __get__fields, __filters, __relations, retRelations, __set__limit, __set__totaldocs, __set__fields, __get__filters, __get__relations, __get__isSortable;
    function Query()
    {
        this.init();
    } // End of the function
    function set limit(n)
    {
        if (n > 0)
        {
            __limit = n;
        } // end if
        //return (this.limit());
        null;
    } // End of the function
    function get limit()
    {
        return (__limit);
    } // End of the function
    function set totaldocs(n)
    {
        if (n < 0)
        {
            n = 0;
        } // end if
        var _loc3 = this.__get__page() * this.__get__limit();
        if (_loc3 >= this.__get__totaldocs())
        {
            this.__set__page(Math.floor(n / this.__get__limit()));
        } // end if
        __totaldocs = n;
        //return (this.totaldocs());
        null;
    } // End of the function
    function get totaldocs()
    {
        return (__totaldocs);
    } // End of the function
    function set page(n)
    {
        var _loc2 = this.__get__page() * this.__get__limit();
        if (_loc2 <= this.__get__totaldocs() && n >= 0)
        {
            __page = n;
        } // end if
        //return (this.page());
        null;
    } // End of the function
    function get page()
    {
        return (__page);
    } // End of the function
    function get sort()
    {
        return (__sort);
    } // End of the function
    function get isSortable()
    {
        //return (this.sort().field == "$DOCORDER" || this.__get__sort().docid != undefined);
    } // End of the function
    function set fields(flds)
    {
        __fields = this.a(flds);
        //return (this.fields());
        null;
    } // End of the function
    function get fields()
    {
        return (__fields);
    } // End of the function
    function get filters()
    {
        return (__filters);
    } // End of the function
    function get relations()
    {
        return (__relations);
    } // End of the function
    function init()
    {
        __filters = [];
        __relations = [];
        retRelations = [];
        this.__set__limit(10);
        this.__set__totaldocs(Number.POSITIVE_INFINITY);
        this.__set__page(0);
        this.setSort("$DOCORDER", "number", "DESC");
        this.__set__fields("*");
    } // End of the function
    function addFilter(ffields, operator, values)
    {
        if (operator == "FULL_TEXT")
        {
            var _loc2 = false;
            for (var _loc3 in __filters)
            {
                if (__filters[_loc3].values[0] == "_STATIC")
                {
                    _loc2 = true;
                    break;
                } // end if
            } // end of for...in
            if (!_loc2)
            {
                this.addFilter("$DOCTYPE", "!=", "_STATIC");
            } // end if
        } // end if
        ffields = this.a(ffields);
        values = this.a(values);
        __filters.push({fields: ffields, values: values, operator: operator});
    } // End of the function
    function removeAllFilters()
    {
        __filters = [];
        __relations = [];
    } // End of the function
    function setSort(fld, type, order)
    {
        __sort = {field: fld, datatype: type, order: order};
    } // End of the function
    function setSortRel(order)
    {
        if (__relations[0].ids.length != 1)
        {
            return;
        } // end if
        var _loc2 = __relations[0];
        __sort = {docid: _loc2.ids[0], relation: _loc2.props[0].name, direction: _loc2.props[0].direction, order: order};
    } // End of the function
    function addRelation(ids, relObjs)
    {
        ids = this.a(ids);
        relObjs = this.a(relObjs);
        __relations.push({ids: ids, props: relObjs});
    } // End of the function
    function taggedWith(ids, includeChildren)
    {
        ids = this.a(ids);
        var _loc2 = [];
        var _loc3 = {name: "tagged_with", direction: "reverse"};
        if (includeChildren)
        {
            _loc2[0] = {name: "child_of", direction: "reverse", closure: "reflexive"};
            _loc2[1] = _loc3;
        }
        else
        {
            _loc2[0] = _loc3;
        } // end else if
        this.addRelation(ids, _loc2);
    } // End of the function
    function relatedTo(ids, rev)
    {
        ids = this.a(ids);
        this.addRelation(ids, {name: "related", direction: rev ? ("reverse") : ("normal")});
    } // End of the function
    function addReturnRelation(name, reverse, count)
    {
        if (name == "")
        {
            retRelations = [];
        }
        else
        {
            var _loc2 = {name: name, direction: reverse ? ("reverse") : ("normal")};
            if (count)
            {
                _loc2.count = "yes";
            } // end if
            retRelations.push(_loc2);
        } // end else if
    } // End of the function
    function getXML(returnOnlyIDs)
    {
        var _loc3 = new XML();
        var _loc8 = _loc3.createElement("request");
        _loc8.attributes.action = "db_query";
        var _loc4;
        var _loc2;
        var _loc6;
        var _loc7;
        for (var _loc10 = 0; _loc10 < this.__get__filters().length; ++_loc10)
        {
            _loc4 = _loc3.createElement("filter");
            _loc7 = this.getValidValue(this.__get__filters()[_loc10].values[0]);
            _loc4.attributes.datatype = _loc7.type;
            for (var _loc5 in this.__get__filters()[_loc10].fields)
            {
                _loc2 = _loc3.createElement("field");
                _loc6 = _loc3.createTextNode(this.__get__filters()[_loc10].fields[_loc5]);
                _loc2.appendChild(_loc6);
                _loc4.appendChild(_loc2);
            } // end of for...in
            for (var _loc5 in this.__get__filters()[_loc10].values)
            {
                _loc2 = _loc3.createElement("value");
                _loc7 = this.getValidValue(this.__get__filters()[_loc10].values[_loc5]);
                _loc6 = _loc3.createTextNode(_loc7.value);
                _loc2.appendChild(_loc6);
                _loc4.appendChild(_loc2);
            } // end of for...in
            _loc2 = _loc3.createElement("operator");
            _loc7 = this.getOperator(this.__get__filters()[_loc10].operator);
            if (_loc7.invert)
            {
                _loc2.attributes.invert = _loc7.invert;
            } // end if
            _loc6 = _loc3.createTextNode(_loc7.value);
            _loc2.appendChild(_loc6);
            _loc4.appendChild(_loc2);
            _loc8.appendChild(_loc4);
        } // end of for
        var _loc9;
        for (var _loc10 = 0; _loc10 < this.__get__relations().length; ++_loc10)
        {
            _loc4 = _loc3.createElement("rel_filter");
            _loc2 = _loc3.createElement("documents");
            for (var _loc5 = 0; _loc5 < this.__get__relations()[_loc10].ids.length; ++_loc5)
            {
                _loc6 = _loc3.createElement("id");
                _loc9 = _loc3.createTextNode(this.__get__relations()[_loc10].ids[_loc5]);
                _loc6.appendChild(_loc9);
                _loc2.appendChild(_loc6);
            } // end of for
            _loc4.appendChild(_loc2);
            for (var _loc5 = 0; _loc5 < this.__get__relations()[_loc10].props.length; ++_loc5)
            {
                _loc2 = _loc3.createElement("relation");
                if (this.__get__relations()[_loc10].props[_loc5].closure)
                {
                    _loc2.attributes.closure = this.__get__relations()[_loc10].props[_loc5].closure;
                } // end if
                if (this.__get__relations()[_loc10].props[_loc5].direction)
                {
                    _loc2.attributes.direction = this.__get__relations()[_loc10].props[_loc5].direction;
                } // end if
                _loc2.attributes.name = this.__get__relations()[_loc10].props[_loc5].name;
                _loc4.appendChild(_loc2);
            } // end of for
            _loc8.appendChild(_loc4);
        } // end of for
        _loc4 = _loc3.createElement("limit");
        _loc2 = _loc3.createTextNode(this.__get__page() * this.__get__limit() + "," + this.__get__limit());
        _loc4.appendChild(_loc2);
        _loc8.appendChild(_loc4);
        _loc4 = _loc3.createElement("sort");
        _loc4.attributes.order = this.__get__sort().order;
        if (this.__get__sort().field != null)
        {
            _loc4.attributes.datatype = this.__get__sort().datatype;
            _loc2 = _loc3.createTextNode(this.__get__sort().field);
            _loc4.appendChild(_loc2);
            _loc8.appendChild(_loc4);
        }
        else if (this.__get__sort().docid != null)
        {
            _loc4.attributes.direction = this.__get__sort().direction;
            _loc4.attributes.relation = this.__get__sort().relation;
            _loc4.attributes.docid = this.__get__sort().docid;
            _loc8.appendChild(_loc4);
        } // end else if
        if (returnOnlyIDs)
        {
            _loc4 = _loc3.createElement("return");
            _loc2 = _loc3.createTextNode("$ID");
            _loc4.appendChild(_loc2);
            _loc8.appendChild(_loc4);
        }
        else
        {
            for (var _loc10 in this.__get__fields())
            {
                _loc4 = _loc3.createElement("return");
                _loc2 = _loc3.createTextNode(this.__get__fields()[_loc10]);
                _loc4.appendChild(_loc2);
                _loc8.appendChild(_loc4);
            } // end of for...in
        } // end else if
        for (var _loc10 in retRelations)
        {
            _loc4 = _loc3.createElement("return_relation");
            if (retRelations[_loc10].count)
            {
                _loc4.attributes.count = retRelations[_loc10].count;
            } // end if
            _loc4.attributes.direction = retRelations[_loc10].direction;
            _loc4.attributes.name = retRelations[_loc10].name;
            _loc8.appendChild(_loc4);
        } // end of for...in
        _loc3.appendChild(_loc8);
        return (_loc3);
    } // End of the function
    function getValidValue(v)
    {
        if (v instanceof Date)
        {
            var _loc7 = this.n2s(v.getFullYear());
            var _loc6 = this.n2s(v.getMonth() + 1);
            var _loc4 = this.n2s(v.getDate());
            var _loc8 = this.n2s(v.getHours());
            var _loc3 = this.n2s(v.getMinutes());
            var _loc5 = this.n2s(v.getSeconds());
            return ({value: _loc7 + "/" + _loc6 + "/" + _loc4 + " " + _loc8 + ":" + _loc3 + ":" + _loc5, type: "date_time"});
        } // end if
        return ({value: v, type: typeof(v)});
    } // End of the function
    function n2s(n)
    {
        n = n.toString();
        if (n.length == 1)
        {
            n = "0" + n;
        } // end if
        return (n);
    } // End of the function
    function getOperator(s)
    {
        var _loc1 = {};
        _loc1.invert = true;
        switch (s)
        {
            case "!=":
            {
                _loc1.value = "=";
                break;
            } 
            case ">=":
            {
                _loc1.value = "<";
                break;
            } 
            case "<=":
            {
                _loc1.value = ">";
                break;
            } 
            case "()":
            {
                _loc1.value = "RANGE";
                delete _loc1.invert;
                break;
            } 
            case "!()":
            {
                _loc1.value = "RANGE";
                break;
            } 
            case "[]":
            {
                _loc1.value = "IRANGE";
                delete _loc1.invert;
                break;
            } 
            case "![]":
            {
                _loc1.value = "IRANGE";
                break;
            } 
            default:
            {
                _loc1.value = s;
                delete _loc1.invert;
                break;
            } 
        } // End of switch
        return (_loc1);
    } // End of the function
    function a(v)
    {
        if (v instanceof Array)
        {
            return (v);
        } // end if
        return ([v]);
    } // End of the function
    function copy()
    {
        var _loc3 = new fcms.Query();
        _loc3.__set__fields(fields);
        _loc3.__set__limit(limit);
        _loc3.__set__page(page);
        for (var _loc2 = 0; _loc2 < this.__get__filters().length; ++_loc2)
        {
            _loc3.addFilter(this.__get__filters()[_loc2].fields, this.__get__filters()[_loc2].operator, this.__get__filters()[_loc2].values);
        } // end of for
        for (var _loc2 = 0; _loc2 < this.__get__relations().length; ++_loc2)
        {
            _loc3.addRelation(this.__get__relations()[_loc2].ids, gr.ground.utils.ObjectTools.copy(this.__get__relations()[_loc2].props));
        } // end of for
        for (var _loc2 = 0; _loc2 < retRelations.length; ++_loc2)
        {
            _loc3.addReturnRelation(retRelations[_loc2].name, retRelations[_loc2].direction == "reverse" ? (true) : (false));
        } // end of for
        if (this.__get__sort().docid != undefined)
        {
            _loc3.setSortRel(this.__get__sort().order);
        }
        else
        {
            _loc3.setSort(this.__get__sort().field, this.__get__sort().datatype, this.__get__sort().order);
        } // end else if
        return (_loc3);
    } // End of the function
    function toString()
    {
        var _loc2 = "/------------------------------------";
        _loc2 = _loc2 + ("\n| select " + this.__get__fields());
        _loc2 = _loc2 + ("\n| from " + this.__get__page() * this.__get__limit() + " to " + (this.__get__page() * this.__get__limit() + this.__get__limit()));
        if (this.__get__sort().docid != undefined)
        {
            _loc2 = _loc2 + ("\n| sort " + __sort.relation + " " + __sort.docid + " (" + __sort.direction + ") " + __sort.order);
        }
        else
        {
            _loc2 = _loc2 + ("\n| sort on " + __sort.field + "(" + __sort.datatype + ") " + __sort.order);
        } // end else if
        var _loc6;
        for (var _loc7 = 0; _loc7 < this.__get__filters().length; ++_loc7)
        {
            _loc2 = _loc2 + (_loc7 == 0 ? ("\n| where ") : ("\n| AND "));
            for (var _loc3 = 0; _loc3 < this.__get__filters()[_loc7].values.length; ++_loc3)
            {
                _loc2 = _loc2 + (_loc3 == 0 ? ("") : ("\n| OR "));
                _loc2 = _loc2 + (this.__get__filters()[_loc7].fields[_loc3] == undefined ? (this.__get__filters()[_loc7].fields[0]) : (this.__get__filters()[_loc7].fields[_loc3]));
                _loc2 = _loc2 + (" " + this.__get__filters()[_loc7].operator);
                _loc6 = this.getValidValue(this.__get__filters()[_loc7].values[_loc3]);
                _loc2 = _loc2 + (" " + _loc6.value + " (" + _loc6.type + ")");
            } // end of for
        } // end of for
        var _loc5 = "";
        var _loc4 = "";
        for (var _loc7 = 0; _loc7 < this.__get__relations().length; ++_loc7)
        {
            _loc2 = _loc2 + "\n| ";
            if (this.__get__relations()[_loc7].props.length == 1)
            {
                if (this.__get__relations()[_loc7].props[0].closure == "reflexive")
                {
                    _loc4 = " reflexive";
                } // end if
                if (this.__get__relations()[_loc7].props[0].direction != "reverse")
                {
                    _loc2 = _loc2 + ("[" + this.__get__relations()[_loc7].ids + "] ");
                }
                else
                {
                    _loc2 = _loc2 + "-> ";
                } // end else if
                _loc2 = _loc2 + (this.__get__relations()[_loc7].props[0].name + " ");
                if (this.__get__relations()[_loc7].props[0].direction == "reverse")
                {
                    _loc2 = _loc2 + ("[" + this.__get__relations()[_loc7].ids + "]" + _loc4);
                }
                else
                {
                    _loc2 = _loc2 + (" ->" + _loc4);
                } // end else if
                continue;
            } // end if
            if (this.__get__relations()[_loc7].props[0].closure == "reflexive")
            {
                _loc4 = " reflexive";
            } // end if
            if (this.__get__relations()[_loc7].props[0].direction != "reverse")
            {
                _loc5 = _loc5 + ("( [" + this.__get__relations()[_loc7].ids + "] ");
            }
            else
            {
                _loc5 = _loc5 + "( ALL ";
            } // end else if
            _loc5 = _loc5 + (this.__get__relations()[_loc7].props[0].name + " ");
            if (this.__get__relations()[_loc7].props[0].direction == "reverse")
            {
                _loc5 = _loc5 + ("[" + this.__get__relations()[_loc7].ids + "]" + _loc4 + " )");
            }
            else
            {
                _loc5 = _loc5 + ("ALL" + _loc4 + " )");
            } // end else if
            _loc4 = "";
            if (this.__get__relations()[_loc7].props[1].closure == "reflexive")
            {
                _loc4 = " reflexive";
            } // end if
            if (this.__get__relations()[_loc7].props[1].direction != "reverse")
            {
                _loc2 = _loc2 + _loc5;
            }
            else
            {
                _loc2 = _loc2 + "-> ";
            } // end else if
            _loc2 = _loc2 + (this.__get__relations()[_loc7].props[1].name + " ");
            if (this.__get__relations()[_loc7].props[1].direction == "reverse")
            {
                _loc2 = _loc2 + _loc5;
                continue;
            } // end if
            _loc2 = _loc2 + " ->";
        } // end of for
        for (var _loc7 in retRelations)
        {
            _loc2 = _loc2 + "\n| ";
            _loc2 = _loc2 + ("return_relation " + retRelations[_loc7].name + " ( " + retRelations[_loc7].direction + " ) ");
        } // end of for...in
        return (_loc2);
    } // End of the function
} // End of Class
