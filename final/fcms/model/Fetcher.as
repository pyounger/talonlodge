class fcms.model.Fetcher
{
    var dispatchEvent, backendPath;
    function Fetcher()
    {
    } // End of the function
    function init()
    {
        mx.events.EventDispatcher.initialize(this);
    } // End of the function
    function doSendAndLoad(xtype, x, passVal)
    {
        x.ignoreWhite = true;
        var eo = {type: "request", action: xtype, data: x};
        this.dispatchEvent(eo);
        var tl = this;
        x.onHTTPStatus = function (no)
        {
            tl.httpStatus = no;
        };
        x.onLoad = function (suc)
        {
            eo.type = "response";
            eo.data = this;
            tl.dispatchEvent(eo);
            if (tl.isError(suc, this, xtype, passVal))
            {
                return;
            } // end if
            tl[xtype + "Response"](this, passVal);
        };
        x.addRequestHeader(["Content-Type", "text/xml"]);
        x.sendAndLoad(backendPath, x);
    } // End of the function
    function isError(success, x, xtype, passVal)
    {
        var _loc3 = {type: "error", action: xtype, httpStatus: httpStatus, requester: passVal};
        if (!success)
        {
            _loc3.origin = "flash";
        }
        else
        {
            var _loc2 = x.childNodes[0].attributes;
            if (_loc2.status == "error")
            {
                _loc3.origin = "backend";
                for (var _loc4 in _loc2)
                {
                    _loc3[_loc4] = _loc2[_loc4];
                } // end of for...in
                this.dispatchEvent(_loc3);
                return (true);
            }
            else
            {
                return (false);
            } // end else if
        } // end else if
        this.dispatchEvent(_loc3);
        return (true);
    } // End of the function
    var httpStatus = "";
} // End of Class
