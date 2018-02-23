class fcms.satellites.Core extends MovieClip
{
    var __isLoading, __get__isLoading, boundingBox_mc, sPageNo, current, target, pathTarget, master, loadingAnim, getNextHighestDepth, attachMovie, initProps, __set__isLoading, ctype, pageExists, showPage, disablePaging, dispatchEvent;
    function Core()
    {
        super();
        this.init();
    } // End of the function
    function set isLoading(b)
    {
        if (b)
        {
            this.setLoadingAnim();
            this.triggerEvent({type: "fetch", start: true, target: this});
        }
        else
        {
            this.removeLoadingAnim();
        } // end else if
        __isLoading = b;
        //return (this.isLoading());
        null;
    } // End of the function
    function get isLoading()
    {
        return (__isLoading);
    } // End of the function
    function init()
    {
        mx.events.EventDispatcher.initialize(this);
        boundingBox_mc._visible = false;
        boundingBox_mc._width = boundingBox_mc._height = 0;
        current = sPageNo;
        pathTarget = targetPath(target);
        if (target == undefined)
        {
            pathTarget = "_STATIC";
        } // end if
        master = _global._fCMS.master;
        if (master == undefined)
        {
            this.traceWarning("CMSMaster component must be initialized before any Satellite component!");
        }
        else
        {
            master.satellites.register(this);
        } // end else if
    } // End of the function
    function onUnload()
    {
        master.satellites.remove(this);
    } // End of the function
    function setLoadingAnim()
    {
        if (loadingAnim)
        {
            return;
        } // end if
        var _loc3 = master.loadingMC == "" ? ("fcmsLoading") : (master.loadingMC);
        var _loc2 = this.attachMovie(_loc3, "loadingAnim", this.getNextHighestDepth());
        _loc2._x = (initProps.width - _loc2._width) / 2;
        _loc2._y = (initProps.height - _loc2._height) / 2;
    } // End of the function
    function removeLoadingAnim()
    {
        var _loc2 = gr.ground.utils.MCTools.getLowestAvailableDepth(this);
        loadingAnim.swapDepths(_loc2);
        loadingAnim.removeMovieClip();
        delete this.loadingAnim;
    } // End of the function
    function onContentLoaded(cached)
    {
        this.triggerEvent({type: "fetch", init: true, target: this, cached: cached});
        this.__set__isLoading(false);
        if (ctype == "template")
        {
            master.satellites.triggerAll("onContentLoaded", [], this);
            this.gotoPage(current);
        }
        else if (ctype == "index")
        {
            this.gotoPage(current);
        } // end else if
    } // End of the function
    function gotoPage(n)
    {
        var _loc3 = true;
        if (typeof(n) == "string")
        {
            if (n == "next")
            {
                n = current + 1;
            }
            else if (n == "prev")
            {
                n = current - 1;
            }
            else if (!isNaN(parseInt(n)))
            {
                n = parseInt(n);
            }
            else
            {
                n = current;
                _loc3 = false;
            } // end else if
        } // end else if
        if (n == undefined)
        {
            n = current;
            _loc3 = false;
        } // end if
        if (ctype == "template")
        {
            if (n != 7777777 && !this.pageExists(n))
            {
                return (false);
            } // end if
        } // end if
        current = n;
        this.showPage(n);
        return (_loc3);
    } // End of the function
    function triggerEvent(obj)
    {
        switch (obj.type)
        {
            case "fetch":
            {
                if (obj.start)
                {
                    disablePaging = true;
                }
                else if (obj.init)
                {
                    disablePaging = false;
                } // end else if
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
        this.dispatchEvent(obj);
    } // End of the function
    function traceWarning(msg)
    {
        trace ("fCMS Warning:");
        trace ("\t" + msg + "\n");
    } // End of the function
} // End of Class
