class tn2.Thumbnailer2 extends tn2.Thumbnailer
{
    var tPos, prvwColor, prvwAlpha, prvwBorderSize, prvwDuration, prvw, displayOnLoad, triggerThumb, __get__movementType, nudge, toggleSlideshow, getNext, unselect, movement, initMovementType, __set__movementType, curActive, thumbs, activeThumb, reinit;
    function Thumbnailer2()
    {
        super();
    } // End of the function
    function init()
    {
        super.init();
        if (tPos != "none")
        {
            prvw = new gr.ground.ui.ImageTip({parent: this, id: "TN2_preview", depth: 1001, color: prvwColor, alpha: prvwAlpha, borderSize: prvwBorderSize, duration: prvwDuration, position: tPos});
        } // end if
        if (tn2.TN2Gallery.__get__imager())
        {
            this.onImagerInit();
        } // end if
    } // End of the function
    function onImagerInit()
    {
        tn2.TN2Gallery.__get__imager().addEventListener("transition", this);
        tn2.TN2Gallery.__get__imager().addEventListener("cover", this);
        if (displayOnLoad != "")
        {
            this.triggerThumb(parseInt(displayOnLoad), true);
        } // end if
    } // End of the function
    function onControlsInit()
    {
        tn2.TN2Gallery.__get__controls().addEventListener("controlClick", this);
        tn2.TN2Gallery.__get__controls().positionAll();
        if (this.__get__movementType() == "Default")
        {
            tn2.TN2Gallery.__get__controls().prevPage.removeMovieClip();
            tn2.TN2Gallery.__get__controls().nextPage.removeMovieClip();
        } // end if
    } // End of the function
    function controlClick(eo)
    {
        switch (eo.id)
        {
            case "prevImage":
            {
                this.triggerThumb("prev", true);
                break;
            } 
            case "nextImage":
            {
                this.triggerThumb("next", true);
                break;
            } 
            case "prevPage":
            {
                this.nudge("prev", true);
                break;
            } 
            case "nextPage":
            {
                this.nudge("next", true);
                break;
            } 
            case "slideshow":
            {
                this.toggleSlideshow();
                break;
            } 
            case "fullscreen":
            {
                if (!eo.mouseRelease)
                {
                    return;
                } // end if
                var _loc3 = Stage.displayState == "fullScreen";
                if (_loc3)
                {
                    Stage.displayState = "normal";
                }
                else
                {
                    Stage.displayState = "fullScreen";
                } // end else if
                break;
            } 
            case "info":
            {
                eo.target.showImgInfo();
                break;
            } 
            case "gallery":
            {
                if (this.__get__movementType() == "Slideshow")
                {
                    this.toggleSlideshow();
                } // end if
                eo.target.displayGrid();
                break;
            } 
            case "tags":
            {
                if (this.__get__movementType() == "Slideshow")
                {
                    this.toggleSlideshow();
                } // end if
                eo.target.displayTags();
                break;
            } 
            case "gallerySelect":
            {
                tn2.TN2Gallery.__get__loader().loadGallery(eo.docID, eo.isXML);
                break;
            } 
            case "tagSelect":
            {
                tn2.TN2Gallery.__get__loader().loadTag(eo.docID);
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
    } // End of the function
    function transition(eo)
    {
        if (eo.end && this.__get__movementType() == "Slideshow")
        {
            var _loc2 = this.getNext().no;
            if (_loc2 == undefined)
            {
                _loc2 = 1;
            } // end if
            if (tn2.TN2Gallery.data[_loc2].image_src != undefined)
            {
                tn2.TN2Gallery.__get__imager().load(tn2.TN2Gallery.data[_loc2].image_src, true, _loc2);
            } // end if
        } // end if
    } // End of the function
    function cover(eo)
    {
        if (eo.start)
        {
        }
        else if (eo.end)
        {
            this.unselect();
            if (this.__get__movementType() == "Slideshow")
            {
                movement.cancelDelay();
                this.__set__movementType(initMovementType);
            } // end if
        } // end else if
    } // End of the function
    function triggerThumbEvent(ev, no)
    {
        if (ev == "over" && tPos != "none" && curActive != thumbs["th" + no])
        {
            activeThumb = thumbs["th" + no];
            prvw.load(tn2.TN2Gallery.data[no].preview_src, {x: thumbs._x + activeThumb._x, y: thumbs._y + activeThumb._y, t: activeThumb});
        }
        else if (ev == "release" && tPos != "none")
        {
            prvw.unload();
        }
        else if (ev == "load")
        {
            gs.TweenLite.from(thumbs["th" + no], 5.000000E-001, {_alpha: 0});
        } // end else if
        super.triggerThumbEvent(ev, no);
    } // End of the function
    function onImageData()
    {
        this.reinit();
    } // End of the function
} // End of Class
