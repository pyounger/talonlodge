class tn2.TN2Controls extends tn2.TN2ControlDefs
{
    var cbtns, enableControl, __get__enabled, intID, hideImagerCtrls, hideStatus, slideshow, download, tags, gallery, nextPage, prevPage, hideList, imgPosition, nextImage, prevImage, fsPosition, fullscreen, infoPosition, info, gridSizeString, gridSize, conList, autodisplay, galtag, grid, tagsField, showInfo, ctrlsHidden, posDefs, setPosition, dispatchEvent, galtagsRef, definePosition, close, toggle, preloader, timer, hitTest, imgInfo, aImage, gInfo, tInfo, galBGAlpha, galBGCol, btnDistance, tagOverCol, tagCloud, curGalPage, id, no, isXML, __set__enabled, hideAlpha, hideDelay;
    function TN2Controls()
    {
        super();
        this.init();
    } // End of the function
    function set enabled(b)
    {
        for (var _loc3 in cbtns)
        {
            this.enableControl(cbtns[_loc3], b);
        } // end of for...in
        tn2.TN2Gallery.__get__loader().enabled = b;
        __enabled = b;
        //return (this.enabled());
        null;
    } // End of the function
    function get enabled()
    {
        return (__enabled);
    } // End of the function
    function init()
    {
        if (!tn2.TN2Gallery.__get__loader())
        {
            if (intID == undefined)
            {
                intID = setInterval(this, "init", 10);
            } // end if
            return;
        } // end if
        clearInterval(intID);
        super.init();
        Stage.addListener(this);
        tn2.TN2Gallery.__set__controls(this);
        tn2.TN2Gallery.__get__imager().addEventListener("progress", this);
        tn2.TN2Gallery.__get__imager().addEventListener("cover", this);
        tn2.TN2Gallery.__get__imager().addEventListener("load", mx.utils.Delegate.create(this, imgLoad));
        tn2.TN2Gallery.__get__imager().addEventListener("change", this);
        tn2.TN2Gallery.__get__imager().addEventListener("transition", this);
        if (hideImagerCtrls)
        {
            tn2.TN2Gallery.__get__imager().addEventListener("over", this);
            tn2.TN2Gallery.__get__imager().addEventListener("out", this);
        } // end if
        tn2.TN2Gallery.__get__loader().addEventListener("time", this);
        tn2.TN2Gallery.__get__loader().addEventListener("thumbsLoaded", this);
        tn2.TN2Gallery.__get__loader().addEventListener("thumbsLoadInit", this);
        tn2.TN2Gallery.__get__loader().addEventListener("release", this);
        tn2.TN2Gallery.__get__loader().addEventListener("resize", this);
        tn2.TN2Gallery.__get__loader().addEventListener("change", mx.utils.Delegate.create(this, loaderChange));
        if (hideStatus != "Disabled")
        {
            hideList = [tn2.TN2Gallery.__get__loader().background, tn2.TN2Gallery.__get__loader(), prevPage, nextPage, gallery, tags, download, slideshow];
            if (imgPosition != "Image Sides")
            {
                hideList.push(prevImage, nextImage);
            } // end if
            if (fsPosition == "Default")
            {
                hideList.push(fullscreen);
            } // end if
            if (infoPosition == "Default")
            {
                hideList.push(info);
            } // end if
        } // end if
        gridSize = gridSizeString.split("x");
        if (gridSize.length == 2)
        {
            for (var _loc3 in gridSize)
            {
                gridSize[_loc3] = parseInt(gridSize[_loc3]);
                if (isNaN(gridSize[_loc3]) || gridSize[_loc3] == 0)
                {
                    gridSize[_loc3] = 2;
                } // end if
            } // end of for...in
        }
        else
        {
            gridSize = [2, 2];
        } // end else if
        if (conList["gallery/tags"] == "1" || autodisplay)
        {
            tn2.TN2Gallery.__get__loader().addEventListener("infoLoad", this);
            tn2.TN2Gallery.__get__loader().loadInfo(galtag != "Tags", galtag != "Gallery");
        } // end if
    } // End of the function
    function thumbsLoaded(eo)
    {
        this.enableHide(hideStatus == "Always");
        this.enableControl(prevPage, true);
        this.enableControl(nextPage, true);
    } // End of the function
    function thumbsLoadInit(eo)
    {
        prevPage._visible = nextPage._visible = true;
        this.enableControl(prevPage, false);
        this.enableControl(nextPage, false);
    } // End of the function
    function release(eo)
    {
        grid._visible = tagsField._visible = false;
    } // End of the function
    function transition(eo)
    {
        if (eo.end)
        {
            if (showInfo == "Always" || info._selected)
            {
                this.showImgInfo(true);
            } // end if
            inTransition = false;
            if (hideImagerCtrls && !eo.mc.hitTest(_root._xmouse, _root._ymouse))
            {
                this.out(eo);
            } // end if
        }
        else if (eo.start)
        {
            inTransition = true;
            if (!ctrlsHidden)
            {
                this.enableControl(download, true);
            } // end if
        } // end else if
    } // End of the function
    function change(eo)
    {
        for (var _loc2 in posDefs)
        {
            if (posDefs[_loc2].ref == tn2.TN2Gallery.__get__imager())
            {
                this.setPosition(_loc2, eo.justLoaded);
            } // end if
        } // end of for...in
    } // End of the function
    function onResize()
    {
        for (var _loc2 in posDefs)
        {
            if (posDefs[_loc2].ref == Stage)
            {
                this.setPosition(_loc2);
                continue;
            } // end if
            if (posDefs[_loc2].ref == tn2.TN2Gallery.__get__loader() && tn2.TN2Gallery.__get__loader().autosize)
            {
                this.setPosition(_loc2);
            } // end if
        } // end of for...in
    } // End of the function
    function resize(eo)
    {
        this.onResize();
    } // End of the function
    function onFullScreen(isFS)
    {
        this.dispatchEvent({type: "controlClick", target: fullscreen, id: "fullscreen"});
        if (isFS)
        {
            if (tn2.TN2Gallery.__get__imager().fsContainer == "Stage")
            {
                if (conList["gallery/tags"] == "1")
                {
                    galtagsRef = posDefs.grid.ref;
                    this.definePosition("grid", {ref: Stage});
                    this.definePosition("tagsField", {ref: Stage});
                } // end if
            } // end if
            if (hideStatus == "In FullScreen")
            {
                this.enableHide(true);
            } // end if
            close._visible = false;
        }
        else
        {
            if (tn2.TN2Gallery.__get__imager().fsContainer == "Stage")
            {
                if (conList["gallery/tags"] == "1")
                {
                    this.definePosition("grid", {ref: galtagsRef});
                    this.definePosition("tagsField", {ref: galtagsRef});
                } // end if
            } // end if
            if (hideStatus == "In FullScreen")
            {
                this.enableHide(false);
            } // end if
            if (tn2.TN2Gallery.__get__imager().container == "Stage Cover")
            {
                close._visible = true;
            } // end if
        } // end else if
        this.toggle(fullscreen, isFS);
    } // End of the function
    function progress(eo)
    {
        if (preloader._visible == false)
        {
            preloader._visible = true;
            preloader._alpha = 100;
            this.setPosition("preloader");
            gs.TweenLite.from(preloader, 5.000000E-001, {_alpha: 0});
        } // end if
        preloader.onProgress(eo.value);
    } // End of the function
    function time(eo)
    {
        if (eo.start)
        {
            this.setPosition("timer");
            gs.TweenLite.to(timer, 5.000000E-001, {autoAlpha: 100});
        }
        else if (eo.end)
        {
            timer._alpha = 0;
            timer._visible = false;
        } // end else if
        timer.onTime(eo.value, eo.total);
    } // End of the function
    function enableHide(b)
    {
        var _loc5 = tn2.TN2Gallery.__get__loader().background;
        if (!_loc5)
        {
            return;
        } // end if
        if (b)
        {
            var hideTween;
            var showTween = false;
            _loc5.onEnterFrame = function ()
            {
                if (this.hitTest(_level0._xmouse, _level0._ymouse, false))
                {
                    if (!showTween)
                    {
                        for (var _loc4 in tn2.TN2Gallery.__get__controls().hideList)
                        {
                            gs.TweenLite.to(tn2.TN2Gallery.__get__controls().hideList[_loc4], 1, {_alpha: 100});
                        } // end of for...in
                        showTween = true;
                        hideTween = false;
                    } // end if
                }
                else if (!hideTween)
                {
                    if (tn2.TN2Gallery.__get__loader().thumbnailsLoaded)
                    {
                        for (var _loc4 in tn2.TN2Gallery.__get__controls().hideList)
                        {
                            gs.TweenLite.to(tn2.TN2Gallery.__get__controls().hideList[_loc4], 1, {delay: tn2.TN2Gallery.__get__controls().hideDelay / 1000, _alpha: tn2.TN2Gallery.__get__controls().hideAlpha});
                        } // end of for...in
                        showTween = false;
                        hideTween = true;
                    } // end if
                } // end else if
            };
        }
        else
        {
            for (var _loc4 in tn2.TN2Gallery.__get__controls().hideList)
            {
                gs.TweenLite.killTweensOf(tn2.TN2Gallery.__get__controls().hideList[_loc4]);
            } // end of for...in
            if (ctrlsHidden)
            {
                _loc5.onEnterFrame = undefined;
                for (var _loc4 in hideList)
                {
                    if (hideList[_loc4]._alpha != 100)
                    {
                        gs.TweenLite.to(hideList[_loc4], 1, {_alpha: 100});
                    } // end if
                } // end of for...in
            } // end if
        } // end else if
        ctrlsHidden = b;
    } // End of the function
    function cover(eo)
    {
        if (eo.start)
        {
            this.setPosition("close");
            for (var _loc2 in cbtns)
            {
                cbtns[_loc2]._visible = false;
            } // end of for...in
            if (eo.coverType == "Stage Cover")
            {
                close._visible = true;
            }
            else
            {
                Stage.displayState = "fullScreen";
            } // end else if
        }
        else if (eo.end)
        {
            for (var _loc2 in cbtns)
            {
                cbtns[_loc2]._visible = true;
            } // end of for...in
            close._visible = false;
            nextImage._visible = false;
            prevImage._visible = false;
            fullscreen._visible = false;
            info._visible = false;
            imgInfo._visible = false;
        } // end else if
    } // End of the function
    function imgLoad(eo)
    {
        aImage = eo.target;
        this.setPosition("imgInfo");
        imgInfo.title_txt.text = eo.title ? (eo.title) : ("");
        imgInfo.description_txt.text = eo.description ? (eo.description) : ("");
        this.showImgInfo(false);
        prevImage._visible = nextImage._visible = true;
        fullscreen._visible = true;
        info._visible = true;
        gs.TweenLite.to(preloader, 5.000000E-001, {autoAlpha: 0});
    } // End of the function
    function showImgInfo(b)
    {
        if (b == undefined)
        {
            if (showInfo == "RollOver")
            {
                return;
            } // end if
            b = !imgInfo._visible;
            this.toggle(info, b);
        } // end if
        imgInfo._visible = b;
    } // End of the function
    function infoLoad(eo)
    {
        gInfo = eo.galleries;
        tInfo = eo.tags;
        this.setGalPage(0);
        tn2.TN2Gallery.attachControl(grid, "nextGalleryPage", 1000);
        tn2.TN2Gallery.attachControl(grid, "prevGalleryPage", 1001);
        var _loc5 = grid.createEmptyMovieClip("bg", -5);
        _loc5._y = grid._height;
        _loc5.beginFill(galBGCol, galBGAlpha);
        _loc5.lineTo(grid._width, 0);
        _loc5.lineTo(grid._width, grid.nextGalleryPage._height + 2 * btnDistance);
        _loc5.lineTo(0, grid.nextGalleryPage._height + 2 * btnDistance);
        _loc5.lineTo(0, 0);
        _loc5.endFill();
        grid.nextGalleryPage._x = grid._width - grid.nextGalleryPage._width - btnDistance;
        grid.nextGalleryPage._y = grid.bg._y + btnDistance;
        grid.prevGalleryPage._x = btnDistance;
        grid.prevGalleryPage._y = grid.bg._y + btnDistance;
        grid.nextGalleryPage.onRelease = function ()
        {
            tn2.TN2Gallery.__get__controls().setGalPage(tn2.TN2Gallery.__get__controls().curGalPage + 1, true);
        };
        grid.prevGalleryPage.onRelease = function ()
        {
            tn2.TN2Gallery.__get__controls().setGalPage(tn2.TN2Gallery.__get__controls().curGalPage - 1, true);
        };
        for (var _loc3 = tagOverCol.toString(16); _loc3.length < 6; _loc3 = "0" + _loc3)
        {
        } // end of for
        tagCloud = new gr.ground.text.TagCloud(tagsField._txt, this, {color: "#" + _loc3, textDecoration: "underline"}, galBGCol, galBGAlpha);
        var _loc6 = [];
        var _loc4;
        for (var _loc2 = 0; _loc2 < tInfo.length; ++_loc2)
        {
            if (tInfo[_loc2].label == "ImageTags")
            {
                _loc4 = tInfo[_loc2].id;
                break;
            } // end if
        } // end of for
        for (var _loc2 = 0; _loc2 < tInfo.length; ++_loc2)
        {
            if (tInfo[_loc2].parent[0] == _loc4)
            {
                _loc6.push(tInfo[_loc2]);
            } // end if
        } // end of for
        tagCloud.__set__tags(_loc6);
        if (autodisplay)
        {
            if (galtag != "Tags")
            {
                gallery.onRelease();
            }
            else
            {
                tags.onRelease();
            } // end if
        } // end else if
    } // End of the function
    function setGalPage(p, triggerEvent)
    {
        if (curGalPage != p)
        {
            var _loc11 = gridSize[0] * gridSize[1];
            if (p * _loc11 < gInfo.length && p >= 0)
            {
                curGalPage = p;
            }
            else
            {
                return;
            } // end else if
            var _loc3;
            var _loc2;
            var _loc12 = [];
            for (var _loc4 = 0; _loc4 < _loc11; ++_loc4)
            {
                _loc2 = tn2.TN2Gallery.attachControl(grid, "galleryRecord", _loc4, {}, "mc" + _loc4);
                _loc12.push(_loc2);
                _loc2._x = _loc4 % gridSize[0] * _loc2._width;
                _loc2._y = Math.floor(_loc4 / gridSize[0]) * _loc2._height;
                _loc3 = p * _loc11 + _loc4;
                if (gInfo[_loc3] == undefined)
                {
                    continue;
                } // end if
                _loc2.title_txt.text = gInfo[_loc3].title;
                _loc2.description_txt.text = gInfo[_loc3].description != undefined ? (gInfo[_loc3].description) : ("");
                _loc2.bg.id = gInfo[_loc3].id;
                _loc2.bg.no = _loc4;
                if (gInfo[_loc3].isXML)
                {
                    _loc2.bg.isXML = true;
                } // end if
                var tl = this;
                _loc2.bg.onRelease = function ()
                {
                    tl.displayGrid(false);
                    tl.enabled = true;
                    tn2.TN2Gallery.__get__controls().dispatchEvent({type: "controlClick", target: tn2.TN2Gallery.__get__controls(), id: "gallerySelect", docID: id, no: no, isXML: isXML ? (true) : (false)});
                };
                var _loc5 = gInfo[_loc3].thumb_src;
                if (_loc5 != undefined)
                {
                    _loc2.mcl = new MovieClipLoader();
                    _loc2.mcl.addListener(this);
                    _loc2.mcl.loadClip(_loc5, _loc2.thumb);
                } // end if
            } // end of for
        }
        else
        {
            _loc11 = gridSize[0] * gridSize[1];
            _loc12 = [];
            for (var _loc4 = 0; _loc4 < _loc11; ++_loc4)
            {
                _loc12.push(grid["mc" + _loc4]);
            } // end of for
        } // end else if
        var _loc14 = p * _loc11 + 1;
        var _loc13 = (p + 1) * _loc11;
        grid.nextGalleryPage._visible = gInfo.length > _loc13;
        grid.prevGalleryPage._visible = p != 0;
        if (triggerEvent)
        {
            tn2.TN2Gallery.__get__controls().dispatchEvent({type: "grid", target: tn2.TN2Gallery.__get__controls(), mcs: _loc12, page: p, next: grid.nextGalleryPage, prev: grid.prevGalleryPage, bg: grid.bg});
        } // end if
    } // End of the function
    function onLoadInit(tar)
    {
        gs.TweenLite.killTweensOf(tar);
        gs.TweenLite.from(tar, 5.000000E-001, {_alpha: 0});
    } // End of the function
    function displayGrid(b)
    {
        if (b == undefined)
        {
            b = !grid._visible;
            this.toggle(gallery, b);
            this.toggle(tags, !b);
        } // end if
        this.setPosition("grid");
        tagsField._visible = false;
        grid._visible = b;
        this.enableControl(tags, true);
        if (b)
        {
            this.setGalPage(0, true);
        } // end if
    } // End of the function
    function displayTags(b)
    {
        if (b == undefined)
        {
            b = !tagsField._visible;
            this.toggle(tags, b);
            this.toggle(gallery, !b);
        } // end if
        this.setPosition("tagsField");
        grid._visible = false;
        tagsField._visible = b;
        this.enableControl(gallery, true);
    } // End of the function
    function onTag(id)
    {
        this.displayTags(false);
        this.__set__enabled(true);
        tn2.TN2Gallery.__get__controls().dispatchEvent({type: "controlClick", target: tn2.TN2Gallery.__get__controls(), id: "tagSelect", docID: parseInt(id)});
    } // End of the function
    function loaderChange(eo)
    {
        if (eo.newMovement == "Slideshow")
        {
            this.toggle(slideshow, true);
        }
        else if (eo.oldMovement == "Slideshow")
        {
            this.toggle(slideshow, false);
        } // end else if
    } // End of the function
    function over(eo)
    {
        if (!eo.mc.hitTest(_root._xmouse, _root._ymouse) || inTransition)
        {
            return;
        } // end if
        for (var _loc4 in posDefs)
        {
            if (posDefs[_loc4].ref == tn2.TN2Gallery.__get__imager())
            {
                if (!neverHide[_loc4])
                {
                    gs.TweenLite.killTweensOf(this[_loc4]);
                    gs.TweenLite.to(this[_loc4], 5.000000E-001, {autoAlpha: 100});
                } // end if
            } // end if
        } // end of for...in
    } // End of the function
    function out(eo)
    {
        if (eo.mc.hitTest(_root._xmouse, _root._ymouse))
        {
            return;
        } // end if
        for (var _loc5 in posDefs)
        {
            if (posDefs[_loc5].ref == tn2.TN2Gallery.__get__imager())
            {
                if (!neverHide[_loc5])
                {
                    gs.TweenLite.killTweensOf(this[_loc5]);
                    gs.TweenLite.to(this[_loc5], 5.000000E-001, {autoAlpha: hideAlpha, delay: hideDelay / 1000});
                } // end if
            } // end if
        } // end of for...in
    } // End of the function
    var __enabled = true;
    var inTransition = false;
    var neverHide = {timer: true, preloader: true, imgInfo: true, grid: true, tagsField: true};
} // End of Class
