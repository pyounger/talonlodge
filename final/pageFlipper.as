class pageFlipper extends MovieClip
{
    var getNextHighestDepth, _Depth, _width, _height, _xscale, _yscale, mcBox, __get__xmlFile, __get__pageList, __get__pageFolder, __get__startPage, __get__followSpeed, __get__clickSpeed, __get__clickCornerSize, __get__overCornerSize, __get__Scale2Fit, __get__loadOnDemand, __get__shadowStrength, __get__backColor, __get__loaderColor, __get__displayOnLoad, __get__numbering, __get__pageOrder, __get__flipSound, __get__pageHeight, __get__pageWidth, flipXML, firstChild, main, createEmptyMovieClip, pageLoader, attachMovie, page, pages, intero, __set__clickSpeed, pagesOrder, pageCanTear, maxpage, num, soundObj, leftPageNumber, rightPageNumber, pleft, pleftb, keep2, sp2, sp3, prev_pright, prev_prightb, pageNumber, mousecontroll, mainflip, went, pageHalf, oy, r0, r1, pageN, pageO, offs, noPage, tox, toy, ox, anim, __set__Scale2Fit, __set__backColor, __set__clickCornerSize, __set__displayOnLoad, __set__flipSound, __set__followSpeed, __set__loadOnDemand, __set__loaderColor, __set__numbering, __set__overCornerSize, __set__pageFolder, __set__pageHeight, __set__pageList, __set__pageOrder, __set__pageWidth, __set__shadowStrength, __set__startPage, __set__xmlFile;
    function pageFlipper()
    {
        super();
        _Depth = this.getNextHighestDepth();
        _pageWidth = _width / 2;
        _pageHeight = _height;
        _xscale = 100;
        _yscale = 100;
        mcBox._visible = false;
        if (_xmlFile.substring(_xmlFile.length - 4, _xmlFile.length) == ".xml")
        {
            this.loadXML(_xmlFile);
        }
        else
        {
            this.onListFormed();
        } // end else if
    } // End of the function
    function set xmlFile(value)
    {
        _xmlFile = value;
        //return (this.xmlFile());
        null;
    } // End of the function
    function get xmlFile()
    {
        return (_xmlFile);
    } // End of the function
    function set pageList(value)
    {
        _pageList = value;
        //return (this.pageList());
        null;
    } // End of the function
    function get pageList()
    {
        return (_pageList);
    } // End of the function
    function set pageFolder(value)
    {
        _pageFolder = value;
        //return (this.pageFolder());
        null;
    } // End of the function
    function get pageFolder()
    {
        return (_pageFolder);
    } // End of the function
    function set startPage(value)
    {
        _startPage = value;
        if (_startPage == 0)
        {
            _startPage = 1;
        } // end if
        //return (this.startPage());
        null;
    } // End of the function
    function get startPage()
    {
        return (_startPage);
    } // End of the function
    function set followSpeed(value)
    {
        fspeed = value;
        //return (this.followSpeed());
        null;
    } // End of the function
    function get followSpeed()
    {
        return (fspeed);
    } // End of the function
    function set clickSpeed(value)
    {
        cspeed = value;
        _gotoSpeed = value;
        //return (this.clickSpeed());
        null;
    } // End of the function
    function get clickSpeed()
    {
        return (cspeed);
    } // End of the function
    function set clickCornerSize(value)
    {
        clickarea = 0;
        //return (this.clickCornerSize());
        null;
    } // End of the function
    function get clickCornerSize()
    {
        return (clickarea);
    } // End of the function
    function set overCornerSize(value)
    {
        autof_sq = value;
        //return (this.overCornerSize());
        null;
    } // End of the function
    function get overCornerSize()
    {
        return (autof_sq);
    } // End of the function
    function set Scale2Fit(value)
    {
        scale2Fit = value;
        //return (this.Scale2Fit());
        null;
    } // End of the function
    function get Scale2Fit()
    {
        return (scale2Fit);
    } // End of the function
    function set loadOnDemand(value)
    {
        _loadOnDemand = value;
        //return (this.loadOnDemand());
        null;
    } // End of the function
    function get loadOnDemand()
    {
        return (_loadOnDemand);
    } // End of the function
    function set shadowStrength(value)
    {
        _shadow = value;
        //return (this.shadowStrength());
        null;
    } // End of the function
    function get shadowStrength()
    {
        return (_shadow);
    } // End of the function
    function set backColor(value)
    {
        _backColor = value;
        //return (this.backColor());
        null;
    } // End of the function
    function get backColor()
    {
        return (_backColor);
    } // End of the function
    function set loaderColor(value)
    {
        _loaderColor = value;
        //return (this.loaderColor());
        null;
    } // End of the function
    function get loaderColor()
    {
        return (_loaderColor);
    } // End of the function
    function set displayOnLoad(value)
    {
        _display = value;
        //return (this.displayOnLoad());
        null;
    } // End of the function
    function get displayOnLoad()
    {
        return (_display);
    } // End of the function
    function set numbering(value)
    {
        _numbering = value;
        //return (this.numbering());
        null;
    } // End of the function
    function get numbering()
    {
        return (_numbering);
    } // End of the function
    function set pageOrder(value)
    {
        _direction = value;
        //return (this.pageOrder());
        null;
    } // End of the function
    function get pageOrder()
    {
        return (_direction);
    } // End of the function
    function set flipSound(value)
    {
        _flipSound = value;
        //return (this.flipSound());
        null;
    } // End of the function
    function get flipSound()
    {
        return (_flipSound);
    } // End of the function
    function set pageHeight(value)
    {
        _pageHeight = value;
        //return (this.pageHeight());
        null;
    } // End of the function
    function get pageHeight()
    {
        return (_pageHeight);
    } // End of the function
    function set pageWidth(value)
    {
        _pageWidth = value;
        //return (this.pageWidth());
        null;
    } // End of the function
    function get pageWidth()
    {
        return (_pageWidth);
    } // End of the function
    function restart()
    {
        if (_xmlFile.substring(_xmlFile.length - 4, _xmlFile.length) == ".xml")
        {
            this.loadXML(_xmlFile);
        }
        else
        {
            this.onListFormed();
        } // end else if
    } // End of the function
    function loadXML(xmlFile)
    {
        flipXML = new XML();
        flipXML.ignoreWhite = true;
        flipXML.main = this;
        flipXML.onLoad = function (ok)
        {
            if (ok)
            {
                if (firstChild.childNodes[0].nodeName == "settings")
                {
                    var _loc3 = 1;
                    main.override(firstChild.childNodes[0].attributes);
                }
                else
                {
                    _loc3 = 0;
                } // end else if
                main._pageList = new Array();
                for (var _loc2 = _loc3; _loc2 < firstChild.childNodes.length; ++_loc2)
                {
                    main._pageList.push(firstChild.childNodes[_loc2].firstChild);
                } // end of for
                main.onListFormed();
            }
            else
            {
                main.onListFormed();
            } // end else if
        };
        if (_level0._URL.indexOf("file:///") == -1)
        {
            xmlFile = xmlFile + (_level0._URL.indexOf("?") == -1 ? ("?") : ("&"));
            xmlFile = xmlFile + ("noCache=" + new Date().getTime());
            flipXML.load(xmlFile);
        }
        else
        {
            flipXML.load(xmlFile);
        } // end else if
    } // End of the function
    function onListFormed()
    {
        if (_flipSound != undefined || _flipSound != "")
        {
            this.loadFlipSound();
        } // end if
        this.createEmptyMovieClip("pageLoader", _Depth);
        pageLoader._visible = false;
        pageLoader.preloads = 0;
        this.attachMovie("pages", "pages", _Depth + 1, {_x: _pageWidth, _y: _pageHeight / 2, _visible: false});
        this.addPage("start", false, 0);
        if (_pageList == undefined)
        {
            _pageList = new Array();
            _pageList.push("pfBack");
        } // end if
        if (_pageList.length / 2 != Math.ceil(_pageList.length / 2) && _pageList.length / 2 != Math.floor(_pageList.length / 2))
        {
            _pageList.push("pfBack");
        } // end if
        if (_direction == "last to first")
        {
            _pageList.reverse();
        } // end if
        for (var _loc2 = 0; _loc2 < _pageList.length; ++_loc2)
        {
            this.addPage(_pageList[_loc2], false, _loc2 + 1);
        } // end of for
        this.addPage("end", false, _pageList.length + 1);
        page = 0;
        this.setupMouse();
        this.resetPages();
        this.reset();
        pages._visible = !_display;
        if (!_display)
        {
            intero = setInterval(this, "oef", 10);
            this.gotoPage(_startPage, true);
        } // end if
    } // End of the function
    function override(attrs)
    {
        if (attrs.startPage != undefined)
        {
            _startPage = parseInt(attrs.startPage);
            if (_startPage == 0)
            {
                _startPage = 1;
            } // end if
        } // end if
        if (attrs.followSpeed != undefined)
        {
            fspeed = parseInt(attrs.followSpeed);
        } // end if
        if (attrs.flipSpeed != undefined)
        {
            this.__set__clickSpeed(parseInt(attrs.flipSpeed));
        } // end if
        if (attrs.overCornerSize != undefined)
        {
            autof_sq = parseInt(attrs.overCornerSize);
        } // end if
        if (attrs.clickCornerSize != undefined)
        {
            clickarea = 0;
        } // end if
        if (attrs.flipSound != undefined)
        {
            _flipSound = attrs.flipSound;
        } // end if
        if (attrs.scaleToFit != undefined)
        {
            scale2Fit = attrs.scaleToFit == "true" ? (true) : (false);
        } // end if
        if (attrs.loadOnDemand != undefined)
        {
            _loadOnDemand = attrs._loadOnDemand == "true" ? (true) : (false);
        } // end if
        if (attrs.shadowStrength != undefined)
        {
            _shadow = parseInt(attrs.shadowStrength);
        } // end if
        if (attrs.backColor != undefined)
        {
            _backColor = parseInt(attrs.backColor);
        } // end if
        if (attrs.displayOnLoad != undefined)
        {
            _display = attrs.displayOnLoad == "true" ? (true) : (false);
        } // end if
        if (attrs.numbering != undefined && (attrs.numbering == "none" || attrs.numbering == "all pages" || attrs.numbering == "even pages only" || attrs.numbering == "odd pages only" || attrs.numbering == "pageNumer/totalNumber format"))
        {
            _numbering = attrs.numbering;
        } // end if
        if (attrs.pageFolder != undefined)
        {
            _pageFolder = attrs.pageFolder;
        } // end if
        if (attrs.pageOrder != undefined && (attrs.pageOrder == "first to last" || attrs.pageOrder == "last to first"))
        {
            _direction = attrs.pageOrder;
        } // end if
    } // End of the function
    function addPage(ename, tear, num)
    {
        if (ename == "start")
        {
            pagesOrder = new Array();
            pageCanTear = new Array();
            page = 0;
            ename = "blankpage";
        } // end if
        if (ename == "end")
        {
            maxpage = page - 1;
            ename = "blankpage";
        } // end if
        tear = tear == undefined ? (false) : (tear);
        pagesOrder[page] = ename;
        pageCanTear[page] = tear;
        this.attachPage(ename, page);
        ++page;
    } // End of the function
    function preLoad(pageLoader, num, main, clipPath)
    {
        var mcLoader = new MovieClipLoader();
        var mcListen = new Object();
        mcListen.pageLoader = pageLoader;
        mcListen.num = num;
        mcListen.main = main;
        mcListen.clipPath = clipPath;
        mcListen.onLoadProgress = function (mc, bytesLoaded, bytesTotal)
        {
            var _loc2 = Math.floor(bytesLoaded / bytesTotal * 100);
            this.pageLoader["page" + this.num].perc = _loc2;
            this.pageLoader["page" + this.num].pageRef._parent.loader.bar._xscale = _loc2;
        };
        mcListen.onLoadInit = function (mc)
        {
            this.pageLoader["page" + this.num].allLoaded = 0;
            var l = 0;
            while (l < this.main.pageArr.length)
            {
                var pageRef = eval(this.main + "." + this.main.pageArr[l]);
                this.main.loadClips(this.pageLoader, this.num, this.main, pageRef);
                ++l;
            } // end while
            --this.pageLoader.preloads;
            if (this.pageLoader.preloads == 0)
            {
                if (this.main._display)
                {
                    this.main.pages._visible = true;
                    this.main.intero = setInterval(this.main, "oef", 10);
                    this.main.gotoPage(this.main._startPage, true);
                } // end if
                this.main.onPagesLoaded();
            } // end if
            this.pageLoader["page" + this.num]._state = "loading";
        };
        mcLoader.addListener(mcListen);
        mcLoader.loadClip(clipPath, pageLoader["img" + num]);
    } // End of the function
    function cacheLoad(pageLoader, num, cacheNum, main)
    {
        var perc = pageLoader["page" + cacheNum].perc;
        pageLoader["page" + num].pageRef._parent.loader.bar._xscale = perc;
        if (perc >= 100 && pageLoader["page" + cacheNum]._state == "loading")
        {
            pageLoader["page" + num]._state = "loading";
            clearInterval(pageLoader["page" + num].intero);
            pageLoader["page" + num].allLoaded = 0;
            var l = 0;
            while (l < main.pageArr.length)
            {
                var pageRef = eval(main + "." + main.pageArr[l]);
                main.loadClips(pageLoader, num, main, pageRef);
                ++l;
            } // end while
        } // end if
    } // End of the function
    function loadClips(pageLoader, num, main, clipRef)
    {
        var _loc3 = new MovieClipLoader();
        var _loc2 = new Object();
        _loc2.pageLoader = pageLoader;
        _loc2.num = num;
        _loc2.main = main;
        _loc2.onLoadInit = function (mc)
        {
            mc._visible = false;
            if (this.main.scale2Fit)
            {
                mc._width = this.main._pageWidth;
                mc._height = this.main._pageHeight;
            } // end if
            ++this.pageLoader["page" + this.num].allLoaded;
            if (this.pageLoader["page" + this.num].allLoaded == this.main.pageArr.length)
            {
                this.pageLoader["page" + this.num]._state = "done";
                if (this.pageLoader["page" + this.num].pageRef != undefined)
                {
                    this.pageLoader["page" + this.num].pageRef._parent.loader._visible = false;
                    this.pageLoader["page" + this.num].pageRef._visible = true;
                    if (!this.main._backAlpha)
                    {
                        this.pageLoader["page" + this.num].pageRef._parent.pageBack._visible = false;
                    } // end if
                    this.main[this.pageLoader["page" + this.num].varRef] = this.pageLoader["page" + this.num].pageRef;
                } // end if
            } // end if
        };
        _loc3.addListener(_loc2);
        _loc3.loadClip(pageLoader["page" + num].image, clipRef["pic" + num]);
    } // End of the function
    function loadFlipSound()
    {
        var _loc2 = _flipSound.substring(_flipSound.length - 4, _flipSound.length);
        if (_loc2 == ".wav" || _loc2 == ".mp3")
        {
            soundObj = new Sound();
            soundObj.onLoad = function (ok)
            {
                if (ok)
                {
                }
                else
                {
                    trace ("Error while loading Sound");
                } // end else if
            };
            soundObj.loadSound(_flipSound, false);
        }
        else
        {
            soundObj = new Sound();
            soundObj.attachSound(_flipSound);
        } // end else if
        false;
    } // End of the function
    function attachPage(ename, num)
    {
        var pageNum = ename + "";
        this.pageLoader.createEmptyMovieClip("img" + num, this.pageLoader.getNextHighestDepth());
        this.pageLoader["page" + num] = new Object();
        this.pageLoader["page" + num].image = this.pageLoader["img" + num];
        var extSlice = pageNum.slice(pageNum.length - 4, pageNum.length);
        if ((extSlice == ".swf" || extSlice == ".jpg" || extSlice == ".gif" || extSlice == ".png") && (!this._loadOnDemand || this._display))
        {
            this.pageLoader["page" + num]._state = "waiting";
            this.pageLoader["page" + num].image = this._pageFolder + pageNum;
            this.pageLoader["page" + num]._type = "preload";
            ++this.pageLoader.preloads;
            var pageRepeats;
            var p = 0;
            while (p < this._pageList.length)
            {
                if (pageNum + "" == this._pageList[p] + "" && num != p + 1 && num > p + 1)
                {
                    pageRepeats = p + 1;
                    break;
                } // end if
                ++p;
            } // end while
            if (pageRepeats != undefined)
            {
                this.pageLoader["img" + num] = this.pageLoader["img" + pageRepeats];
                --this.pageLoader.preloads;
                this.pageLoader["page" + num].cache = pageRepeats;
                this.pageLoader["page" + num].intero = setInterval(this.cacheLoad, 10, this.pageLoader, num, pageRepeats, this);
            }
            else
            {
                this.preLoad(this.pageLoader, num, this, this._pageFolder + pageNum);
            } // end else if
        }
        else if ((extSlice == ".swf" || extSlice == ".jpg" || extSlice == ".gif" || extSlice == ".png") && this._loadOnDemand && !this._display)
        {
            this.pageLoader["page" + num]._state = "waiting";
            this.pageLoader["page" + num].image = this._pageFolder + pageNum;
            this.pageLoader["page" + num]._type = "demand";
        }
        else
        {
            this.pageLoader["page" + num]._state = "attach";
            this.pageLoader["page" + num].image = pageNum;
        } // end else if
        var p = 0;
        while (p < this.pageArr.length)
        {
            var pageRef = eval("this." + this.pageArr[p]);
            pageRef._parent.phMask._width = this._pageWidth;
            pageRef._parent.phMask._height = this._pageHeight;
            pageRef._parent.phMask._y = -this._pageHeight / 2;
            pageRef._parent.phMask._x = 0;
            if (num - 1 == 0)
            {
                pageRef.attachMovie("pfBack", "pageBack", pageRef.getNextHighestDepth(), {_visible: this._backAlpha, _height: this._pageHeight, _width: this._pageWidth});
                if (pageRef.pageBack == undefined)
                {
                    pageRef.attachMovie("backPage", "pageBack", pageRef.getNextHighestDepth(), {_visible: this._backAlpha, _height: this._pageHeight, _width: this._pageWidth});
                    var colorBack = new Color(pageRef.pageBack);
                    colorBack.setRGB(this._backColor);
                } // end if
                if (pageNum == "blankpage" || pageNum == "not defined")
                {
                    pageRef.pageBack._visible = false;
                } // end if
            } // end if
            if (this.pageLoader["page" + num]._state != "attach")
            {
                pageRef.createEmptyMovieClip("pic" + num, pageRef.getNextHighestDepth());
                var showLoader = true;
            }
            else
            {
                pageRef.attachMovie(pageNum, "pic" + num, pageRef.getNextHighestDepth(), {_visible: false});
                if (this.scale2Fit || pageNum == "pfBack")
                {
                    pageRef["pic" + num]._width = this._pageWidth;
                    pageRef["pic" + num]._height = this._pageHeight;
                } // end if
                if (pageNum == "pfBack" && pageRef["pic" + num] == undefined)
                {
                    pageRef.attachMovie("backPage", "pic" + num, pageRef.getNextHighestDepth(), {_visible: false, _height: this._pageHeight, _width: this._pageWidth});
                    var colorBack = new Color(pageRef["pic" + num]);
                    colorBack.setRGB(this._backColor);
                } // end if
                var showLoader = false;
            } // end else if
            if (this._numbering != "none" && pageNum != "blankpage")
            {
                switch (this._numbering)
                {
                    case "all pages":
                    {
                        if (this._direction == "first to last")
                        {
                            this.pageLoader["page" + num].numbering = num;
                        }
                        else
                        {
                            this.pageLoader["page" + num].numbering = this._pageList.length - (num - 1);
                        } // end else if
                        break;
                    } 
                    case "even pages only":
                    {
                        if (Math.floor(num / 2) == num / 2 && Math.ceil(num / 2) == num / 2 && this._direction == "first to last")
                        {
                            this.pageLoader["page" + num].numbering = num;
                        } // end if
                        if (Math.floor((this._pageList.length - (num - 1)) / 2) == (this._pageList.length - (num - 1)) / 2 && Math.ceil((this._pageList.length - (num - 1)) / 2) == (this._pageList.length - (num - 1)) / 2 && this._direction == "last to first")
                        {
                            this.pageLoader["page" + num].numbering = this._pageList.length - (num - 1);
                        } // end if
                        break;
                    } 
                    case "odd pages only":
                    {
                        if (Math.floor(num / 2) != num / 2 && Math.ceil(num / 2) != num / 2 && this._direction == "first to last")
                        {
                            this.pageLoader["page" + num].numbering = num;
                        } // end if
                        if (Math.floor((this._pageList.length - (num - 1)) / 2) != (this._pageList.length - (num - 1)) / 2 && Math.ceil((this._pageList.length - (num - 1)) / 2) != (this._pageList.length - (num - 1)) / 2 && this._direction == "last to first")
                        {
                            this.pageLoader["page" + num].numbering = this._pageList.length - (num - 1);
                        } // end if
                        break;
                    } 
                    case "pageNumber/totalNumber format":
                    {
                        if (this._direction == "first to last")
                        {
                            this.pageLoader["page" + num].numbering = num + "/" + this._pageList.length;
                        }
                        else
                        {
                            this.pageLoader["page" + num].numbering = this._pageList.length - (num - 1) + "/" + this._pageList.length;
                        } // end else if
                        break;
                    } 
                } // End of switch
            } // end if
            if (num + 1 == this._pageList.length)
            {
                if (this._numbering != "none")
                {
                    pageRef.attachMovie("pfNumbering", "numbering", pageRef.getNextHighestDepth(), {_visible: true, _x: this._pageWidth / 2 - 19, _y: this._pageHeight - 40});
                    if (pageRef.numbering == undefined)
                    {
                        pageRef.attachMovie("numbering", "numbering", pageRef.getNextHighestDepth(), {_visible: true, _x: this._pageWidth / 2 - 19, _y: this._pageHeight - 40});
                    } // end if
                } // end if
                pageRef.attachMovie("pfLoader", "loader", pageRef.getNextHighestDepth(), {_visible: showLoader, _x: this._pageWidth / 2, _y: this._pageHeight / 2});
                if (pageRef.loader == undefined)
                {
                    pageRef.attachMovie("bf_loader", "loader", pageRef.getNextHighestDepth(), {_visible: showLoader, _x: this._pageWidth / 2, _y: this._pageHeight / 2});
                    var colorLoader = new Color(pageRef.loader.bar);
                    colorLoader.setRGB(this._loaderColor);
                    var colorLoader = new Color(pageRef.loader.outline);
                    colorLoader.setRGB(this._loaderColor);
                } // end if
                pageRef.loader._x = pageRef.loader._x - pageRef.loader._width / 2;
                pageRef.loader._y = pageRef.loader._y - pageRef.loader._height / 2;
                pageRef.loader.bar._xscale = 0;
                if (showLoader)
                {
                    pageRef.pageBack._visible = true;
                } // end if
            } // end if
            ++p;
        } // end while
    } // End of the function
    function setLoad(pageRef, p, side)
    {
        var _loc4;
        if (pageLoader["page" + p]._type == "demand" && pageLoader["page" + p]._state == "waiting" && p > 0)
        {
            if (side == "pleft" || side == "prev_pright")
            {
                pageLoader["page" + p]._type = "preload";
                this.preLoad(pageLoader, p, this, pageLoader["page" + p].image);
            } // end if
            pageRef.pageBack._visible = true;
            pageLoader["page" + p].pageRef = pageRef["pic" + p];
            pageLoader["page" + p].varRef = side;
            _loc4 = pageRef.loader;
            _loc4.bar._xscale = pageLoader["page" + p].perc;
        } // end if
        if ((pageLoader["page" + p]._type == "preload" || pageLoader["page" + p]._state == "loading") && p > 0)
        {
            pageRef.pageBack._visible = true;
            pageLoader["page" + p].pageRef = pageRef["pic" + p];
            pageLoader["page" + p].varRef = side;
            _loc4 = pageRef.loader;
            _loc4.bar._xscale = pageLoader["page" + p].perc;
        } // end if
        if (pageLoader["page" + p]._state == "attach" || pageLoader["page" + p]._state == "done" || p == 0)
        {
            if (!_backAlpha)
            {
                pageRef.pageBack._visible = false;
            }
            else
            {
                pageRef.pageBack._visible = true;
            } // end else if
            pageLoader["page" + p].pageRef = undefined;
            pageLoader["page" + p].varRef = undefined;
            pageRef.loader._visible = false;
            _loc4 = pageRef["pic" + p];
        } // end if
        if (pageLoader["page" + p].image == "blankpage" || pageLoader["page" + p].image == "not defined")
        {
            pageRef.pageBack._visible = false;
        } // end if
        if (pageLoader["page" + p].numbering != undefined)
        {
            pageRef.numbering._number.text = pageLoader["page" + p].numbering;
            pageRef.numbering._visible = true;
        }
        else
        {
            pageRef.numbering._visible = false;
        } // end else if
        return (_loc4);
    } // End of the function
    function setPages(p1, p2, p3, p4)
    {
        leftPageNumber = p1;
        rightPageNumber = p4;
        var _loc5 = p1 - 2;
        var _loc2 = p4 + 2;
        if (_loc5 < 0)
        {
            _loc5 = 0;
        } // end if
        if (_loc2 > maxpage)
        {
            _loc2 = 0;
        } // end if
        if (p1 < 0)
        {
            p1 = 0;
        } // end if
        if (p2 < 0)
        {
            p2 = 0;
        } // end if
        if (p3 < 0)
        {
            p3 = 0;
        } // end if
        if (p4 < 0)
        {
            p4 = 0;
        } // end if
        pleft._visible = false;
        pages.p1.page.pf.ph._y = -_pageHeight / 2;
        pleft = this.setLoad(pages.p1.page.pf.ph, p1, "pleft");
        pleft._visible = true;
        pages.p0.page.pf.ph._y = -_pageHeight / 2;
        pleftb._visible = false;
        pleftb = this.setLoad(pages.p0.page.pf.ph, _loc5, "pleftb");
        pleftb._visible = true;
        keep2._visible = false;
        pages.flip.hfliph.sp2._visible = false;
        pages.flip.hfliph.sp3._visible = false;
        sp2._visible = false;
        sp2 = this.setLoad(pages.flip.p2.page.pf.ph, p2, "sp2");
        sp2._visible = true;
        pages.flip.p2.page.pf.ph._y = -_pageHeight / 2;
        sp3._visible = false;
        sp3 = this.setLoad(pages.flip.p3.page.pf.ph, p3, "sp3");
        sp3._visible = true;
        pages.flip.p3.page.pf.ph._y = -_pageHeight / 2;
        prev_pright._visible = false;
        prev_pright = this.setLoad(pages.p4.page.pf.ph, p4, "prev_pright");
        prev_pright._visible = true;
        pages.p4.page.pf.ph._y = -_pageHeight / 2;
        prev_prightb._visible = false;
        prev_prightb = this.setLoad(pages.p5.page.pf.ph, _loc2, "prev_prightb");
        prev_prightb._visible = true;
        pages.p5.page.pf.ph._y = -_pageHeight / 2;
    } // End of the function
    function reset()
    {
        pages.p0.page._x = -_pageWidth;
        pages.p0._x = 0;
        pages.p1.page._x = -_pageWidth;
        pages.p1._x = 0;
        pages.flip.p2.page._x = -_pageWidth;
        pages.flip.p2._x = _pageWidth;
        pages.flip.p3.page._x = -_pageWidth;
        pages.flip.p3._x = 0;
        pages.p4.page._x = -_pageWidth;
        pages.p4._x = _pageWidth;
        pages.p5.page._x = -_pageWidth;
        pages.p5._x = _pageWidth;
        pages.pgrad._visible = pages.mask._visible = pages.flip._visible = false;
        pages.flip.p3mask._height = pages.pgmask._height = _pageHeight;
        pages.flip.p3mask._width = pages.pgmask._width = _pageWidth * 2;
        pages.flip.fmask.page.pf._width = _pageWidth;
        pages.flip.fmask.page.pf._height = _pageHeight;
        pages.mask._height = pages.pgrad._height = pages.flip.p3shadow._height = pages.flip.flipgrad._height = 2 * Math.sqrt(_pageHeight * _pageHeight + _pageWidth * _pageWidth);
        pageNumber = new Array();
        for (var _loc2 = 0; _loc2 <= maxpage + 1; ++_loc2)
        {
            pageNumber[_loc2] = _loc2;
        } // end of for
    } // End of the function
    function setupMouse()
    {
        mousecontroll = new Object();
        mousecontroll.main = this;
        mousecontroll.onMouseDown = function ()
        {
            if (mainflip && !main.aflip)
            {
                main.flipOK = false;
                if (main.sx < 0 && main.pages._xmouse > 0)
                {
                    main.flipOK = true;
                } // end if
                if (main.sx > 0 && main.pages._xmouse < 0)
                {
                    main.flipOK = true;
                } // end if
                main.flipOff = true;
                main.flip = false;
            }
            else if ((main.flipOff || main.aflip || !main.canflip) && !main.preflip)
            {
            }
            else
            {
                var _loc6 = main.ox;
                var _loc5 = main.oy;
                var _loc4 = main.sx;
                var _loc3 = main.sy;
                var _loc2 = main.hittest();
                if (_loc2)
                {
                    went = false;
                    clearInterval(intero);
                    intero = setInterval(main, "clickDelay", 200, this);
                    main.onFlipStart();
                    main.anim._visible = false;
                    main.flip = true;
                    main.flipOff = false;
                    main.tear = false;
                    main.ox = main.sx = _loc2 * main._pageWidth;
                    if (main.preflip)
                    {
                        main.aflip = main.preflip = false;
                        (main.ox = _loc6, main.oy = _loc5, main.sx = _loc4, main.sy = _loc3);
                    } // end if
                    main.pages.flip.setMask(main.pages.mask);
                    (main.mpx = main.pages._xmouse, main.mpy = main.pages._ymouse);
                } // end else if
            } // end else if
        };
        mousecontroll.onMouseUp = function ()
        {
            if (main.flip && !main.tear)
            {
                if (Math.abs(main.pages._xmouse) > main._pageWidth - main.autof_sq && Math.abs(main.pages._ymouse) > main._pageHeight / 2 - main.autof_sq && Math.abs(main.pages._xmouse - main.mpx) < main.autof_sq && !went || main.preflip)
                {
                    main.flip = false;
                    main.preflip = false;
                    main.autoflip();
                }
                else if (!main.preflip)
                {
                    main.preflip = false;
                    main.flipOK = false;
                    if (main.sx < 0 && main.pages._xmouse > 0)
                    {
                        main.flipOK = true;
                    } // end if
                    if (main.sx > 0 && main.pages._xmouse < 0)
                    {
                        main.flipOK = true;
                    } // end if
                    main.flipOff = true;
                    main.flip = false;
                    var _loc2 = Math.abs(main.pages._xmouse);
                } // end if
            } // end else if
        };
        Mouse.addListener(mousecontroll);
    } // End of the function
    function clickDelay(ref)
    {
        ref.went = true;
        clearInterval(ref.intero);
    } // End of the function
    function hittest()
    {
        x = pages._xmouse;
        y = pages._ymouse;
        pageHalf = _pageHeight / 2;
        if (y <= pageHalf && y >= -pageHalf && x <= _pageWidth && x >= -_pageWidth)
        {
            var _loc2 = Math.sqrt(x * x + y * y);
            var _loc3 = Math.asin(y / _loc2);
            y = Math.tan(_loc3) * _pageWidth;
            if (y > 0 && y > _pageHeight / 2)
            {
                y = _pageHeight / 2;
            } // end if
            if (y < 0 && y < -_pageHeight / 2)
            {
                y = -_pageHeight / 2;
            } // end if
            oy = sy = y;
            r0 = Math.sqrt((sy + _pageHeight / 2) * (sy + _pageHeight / 2) + _pageWidth * _pageWidth);
            r1 = Math.sqrt((_pageHeight / 2 - sy) * (_pageHeight / 2 - sy) + _pageWidth * _pageWidth);
            pageN = pages.flip.p2.page;
            pageO = pages.flip.p3;
            offs = -_pageWidth;
            pages.flip.fmask._x = _pageWidth;
            if (x < -(_pageWidth - clickarea) && page > 0)
            {
                pages.flip.p3._x = 0;
                noFlip = this.checkCover(page, -1);
                this.setPages(page - 2, page - 1, page, page + 1);
                ctear = pageCanTear[page - 1];
                return (-1);
            } // end if
            if (x > _pageWidth - clickarea && page < maxpage)
            {
                pages.flip.p3._x = _pageWidth;
                noFlip = this.checkCover(page, 1);
                this.setPages(page, page + 2, page + 1, page + 3);
                ctear = pageCanTear[page + 2];
                return (1);
            } // end if
        }
        else
        {
            return (0);
        } // end else if
    } // End of the function
    function checkCover(p, dir)
    {
        if (noPage)
        {
            if (dir > 0)
            {
                if (p == maxpage - 2 || p == 0)
                {
                    return (true);
                } // end if
            }
            else if (p == maxpage || p == 2)
            {
                return (true);
            } // end if
        } // end else if
        return (false);
    } // End of the function
    function corner()
    {
        x = Math.abs(pages._xmouse);
        y = Math.abs(pages._ymouse);
        var _loc3 = pages._xmouse;
        var _loc2 = pages._ymouse;
        if (x > _pageWidth - autof_sq && x < _pageWidth && y > _pageHeight / 2 - autof_sq && y < _pageHeight / 2)
        {
            clickarea = autof_sq;
            return (true);
        }
        else
        {
            clickarea = 0;
        } // end else if
        return (false);
    } // End of the function
    function oef()
    {
        ++mcnt;
        if (!flip && this.corner())
        {
            preflip = true;
            if (!this.autoflip())
            {
                preflip = false;
            } // end if
        } // end if
        if (preflip && !this.corner())
        {
            preflip = false;
            flip = false;
            flipOK = false;
            flipOff = true;
        } // end if
        this.getm();
        if (aflip && !preflip)
        {
            y = ay = ay + (sy - ay) / (gflip ? (_gotoSpeed) : (fspeed));
            acnt = acnt + aadd;
            ax = ax - aadd;
            if (Math.abs(acnt) > _pageWidth)
            {
                flipOK = true;
                flipOff = true;
                flip = false;
                aflip = false;
            } // end if
        } // end if
        if (flip)
        {
            if (tear)
            {
                x = tox;
                y = toy = toy + teard;
                teard = teard * 1.200000E+000;
                if (Math.abs(teard) > 1200)
                {
                    flipOff = true;
                    flip = false;
                } // end if
            }
            else
            {
                x = ox = ox + (x - ox) / (gflip ? (_gotoSpeed) : (fspeed));
                y = oy = oy + (y - oy) / (gflip ? (_gotoSpeed) : (fspeed));
            } // end else if
            this.calc(x, y);
        } // end if
        if (flipOff)
        {
            if (flipOK || tear)
            {
                x = ox = ox + (-sx - ox) / (gflip ? (_gotoSpeed) : (cspeed));
                y = oy = oy + (sy - oy) / (gflip ? (_gotoSpeed) : (cspeed));
                this.calc(x, y);
                if (x / -sx > 9.900000E-001 || tear)
                {
                    flip = false;
                    flipOK = flipOff = false;
                    pages.pgrad._visible = pages.flip._visible = false;
                    if (tear)
                    {
                        page = page + (sx < 0 ? (-2) : (0));
                    }
                    else
                    {
                        page = page + (sx < 0 ? (-2) : (2));
                    } // end else if
                    if (gskip)
                    {
                        page = gtarget;
                    } // end if
                    this.setPages(page, 0, 0, page + 1);
                    this.onPageFlip();
                    soundObj.start();
                    tear = false;
                    if (gpage > 0 && !gskip)
                    {
                        --gpage;
                        this.autoflip();
                    }
                    else
                    {
                        gflip = gskip = false;
                    } // end if
                } // end else if
            }
            else
            {
                x = ox = ox + (sx - ox) / 3;
                y = oy = oy + (sy - oy) / 3;
                this.calc(x, y);
                if (x / sx > 9.900000E-001)
                {
                    flip = false;
                    flipOff = false;
                    aflip = false;
                    pages.pgrad._visible = pages.flip._visible = false;
                    this.setPages(page, 0, 0, page + 1);
                } // end if
            } // end if
        } // end else if
    } // End of the function
    function onPageFlip()
    {
    } // End of the function
    function onFlipStart()
    {
    } // End of the function
    function onPagesLoaded()
    {
    } // End of the function
    function getLeftPageNum()
    {
        return (leftPageNumber);
    } // End of the function
    function getRightPageNum()
    {
        return (rightPageNumber);
    } // End of the function
    function getTotalPages()
    {
        return (_pageList.length);
    } // End of the function
    function calc(x, y)
    {
        if (noFlip)
        {
            var _loc16 = sx < 0 ? (-x) : (x);
            if (_loc16 > 0)
            {
                sp2._visible = false;
                sp3._visible = true;
                this.scalc(sp3, x);
            }
            else
            {
                sp3._visible = false;
                sp2._visible = true;
                this.scalc(sp2, x);
            } // end else if
            pages.flip.setMask(null);
            pages.flip._visible = true;
            pages.flip.fgrad._visible = false;
            pages.flip.p2._visible = pages.flip.p3._visible = false;
            return;
        }
        else
        {
            pages.flip.fgrad._visible = true;
        } // end else if
        var _loc14 = Math.sqrt((y + _pageHeight / 2) * (y + _pageHeight / 2) + x * x);
        var _loc12 = Math.sqrt((_pageHeight / 2 - y) * (_pageHeight / 2 - y) + x * x);
        if ((_loc14 > r0 || _loc12 > r1) && !tear)
        {
            if (y < sy)
            {
                var _loc9 = Math.asin((_pageHeight / 2 - y) / _loc12);
                y = _pageHeight / 2 - Math.sin(_loc9) * r1;
                x = x < 0 ? (-Math.cos(_loc9) * r1) : (Math.cos(_loc9) * r1);
                if (y > sy)
                {
                    if (sx * x > 0)
                    {
                        y = sy;
                        x = sx;
                    }
                    else
                    {
                        y = sy;
                        x = -sx;
                    } // end if
                } // end else if
                if (_loc12 - r1 > tlimit && ctear)
                {
                    teard = -5;
                    tear = true;
                    tox = ox = x;
                    toy = oy = y;
                } // end if
            }
            else
            {
                _loc9 = Math.asin((y + _pageHeight / 2) / _loc14);
                y = Math.sin(_loc9) * r0 - _pageHeight / 2;
                x = x < 0 ? (-Math.cos(_loc9) * r0) : (Math.cos(_loc9) * r0);
                if (y < sy)
                {
                    if (sx * x > 0)
                    {
                        y = sy;
                        x = sx;
                    }
                    else
                    {
                        y = sy;
                        x = -sx;
                    } // end if
                } // end else if
                if (_loc14 - r0 > tlimit && ctear)
                {
                    teard = 5;
                    tear = true;
                    tox = ox = x;
                    toy = oy = y;
                } // end if
            } // end if
        } // end else if
        if (sx < 0 && x - sx < 10 || sx > 0 && sx - x < 10)
        {
            if (sx < 0)
            {
                x = -_pageWidth + 10;
            } // end if
            if (sx > 0)
            {
                x = _pageWidth - 10;
            } // end if
        } // end if
        pages.flip._visible = true;
        pages.flip.p3shadow._visible = pages.pgrad._visible = !tear;
        pages.flip.p2._visible = pages.flip.p3._visible = true;
        var _loc15 = x - sx;
        var _loc13 = y - sy;
        var _loc18 = _loc13 / _loc15;
        var _loc17 = -_loc13 / _loc15;
        var _loc7 = sx + _loc15 / 2;
        var _loc6 = sy + _loc13 / 2;
        var _loc4 = Math.sqrt((sx - x) * (sx - x) + (sy - y) * (sy - y));
        _loc9 = Math.asin((sy - y) / _loc4);
        if (sx < 0)
        {
            _loc9 = -_loc9;
        } // end if
        var _loc11 = _loc9 / AM;
        pageN._rotation = _loc11 * 2;
        _loc4 = Math.sqrt((sx - x) * (sx - x) + (sy - y) * (sy - y));
        var _loc5 = _pageWidth * 2;
        var _loc8;
        var _loc10;
        if (sx > 0)
        {
            pages.mask._xscale = 100;
            _loc8 = _loc7 - Math.tan(_loc9) * (_pageHeight / 2 - _loc6);
            _loc10 = _pageHeight / 2;
            if (_loc8 > _pageWidth)
            {
                _loc8 = _pageWidth;
                _loc10 = _loc6 + Math.tan(1.570796E+000 + _loc9) * (_pageWidth - _loc7);
            } // end if
            pageN.pf._x = -(_pageWidth - _loc8);
            pages.flip.fgrad._xscale = _loc4 / _loc5 / 2 * _pageWidth;
            pages.pgrad._xscale = -_loc4 / _loc5 / 2 * _pageWidth;
            pages.flip.p3shadow._xscale = _loc4 / _loc5 / 2 * _pageWidth;
        }
        else
        {
            pages.mask._xscale = -100;
            _loc8 = _loc7 - Math.tan(_loc9) * (_pageHeight / 2 - _loc6);
            _loc10 = _pageHeight / 2;
            if (_loc8 < -_pageWidth)
            {
                _loc8 = -_pageWidth;
                _loc10 = _loc6 + Math.tan(1.570796E+000 + _loc9) * (-_pageWidth - _loc7);
            } // end if
            pageN.pf._x = -(_pageWidth - (_pageWidth + _loc8));
            pages.flip.fgrad._xscale = -_loc4 / _loc5 / 2 * _pageWidth;
            pages.pgrad._xscale = _loc4 / _loc5 / 2 * _pageWidth;
            pages.flip.p3shadow._xscale = -_loc4 / _loc5 / 2 * _pageWidth;
        } // end else if
        pages.mask._x = _loc7;
        pages.mask._y = _loc6;
        pages.mask._rotation = _loc11;
        pageN.pf._y = -_loc10;
        pageN._x = _loc8 + offs;
        pageN._y = _loc10;
        pages.flip.fgrad._x = _loc7;
        pages.flip.fgrad._y = _loc6;
        pages.flip.fgrad._rotation = _loc11;
        pages.flip.fgrad._alpha = _loc4 > _loc5 - 50 ? (_shadow - (_loc4 - (_loc5 - 50)) * 2) : (_shadow);
        pages.flip.p3shadow._x = _loc7;
        pages.flip.p3shadow._y = _loc6;
        pages.flip.p3shadow._rotation = _loc11;
        pages.flip.p3shadow._alpha = _loc4 > _loc5 - 50 ? (_shadow - (_loc4 - (_loc5 - 50)) * 2) : (_shadow);
        pages.pgrad._x = _loc7;
        pages.pgrad._y = _loc6;
        pages.pgrad._rotation = _loc11 + 180;
        pages.pgrad._alpha = _loc4 > _loc5 - 100 ? (_shadow - (_loc4 - (_loc5 - 100))) : (_shadow);
        pages.flip.fmask.page._x = pageN._x;
        pages.flip.fmask.page._y = pageN._y;
        pages.flip.fmask.page.pf._x = pageN.pf._x;
        pages.flip.fmask.page.pf._y = pageN.pf._y;
        pages.flip.fmask.page._rotation = pageN._rotation;
    } // End of the function
    function scalc(obj, x)
    {
        if (x < -_pageWidth)
        {
            x = -_pageWidth;
        } // end if
        if (x > _pageWidth)
        {
            x = _pageWidth;
        } // end if
        var _loc3 = Math.asin(x / _pageWidth);
        var _loc5 = _loc3 / AM / 2;
        var _loc6 = 100;
        var _loc4 = 100 * Math.sin(rotz * AM);
        x = x / 2;
        y = Math.cos(_loc3) * (_pageWidth / 2) * (_loc4 / 100);
        this.placeImg(obj, _loc5, _loc4, x, y);
        pages.pgrad._visible = pages.flip._visible = true;
        pages.pgrad._xscale = x;
        pages.pgrad._alpha = pages.flip.p3shadow._alpha = _shadow;
        pages.flip.p3shadow._xscale = -x;
        pages.flip.p3shadow._x = 0;
        pages.flip.p3shadow._y = 0;
        pages.flip.p3shadow._rotation = 0;
        pages.pgrad._x = 0;
        pages.pgrad._y = 0;
        pages.pgrad._rotation = 0;
    } // End of the function
    function placeImg(j, rot, ss, x, y)
    {
        var _loc3 = Math.tan(rot * AM);
        var _loc6 = 1.414214E+000 / Math.sqrt(_loc3 * _loc3 + 1);
        var _loc5 = 100 * _loc3;
        var _loc8 = -rot;
        var _loc4 = 100 * _loc6;
        var _loc7 = 100 * _loc6;
        j.ph.pic._rotation = 45;
        j.ph.pic._xscale = _loc5 < 0 ? (-_loc4) : (_loc4);
        j.ph.pic._yscale = _loc7 * (100 / ss);
        j.ph._rotation = _loc8;
        j.ph._xscale = _loc5;
        j._yscale = ss;
        j._x = x;
        j._y = y;
        j._visible = true;
    } // End of the function
    function resetPages()
    {
        this.setPages(page, 0, 0, page + 1);
    } // End of the function
    function autoflip()
    {
        if (!aflip && !flip && !flipOff && canflip)
        {
            acnt = 0;
            aamp = Math.random() * (_pageHeight / 2) - _pageHeight / 4;
            x = gflip ? (gdir * _pageWidth / 2) : (pages._xmouse < 0 ? (-_pageWidth / 2) : (_pageWidth / 2));
            y = Math.random() * (_pageHeight / 2) - _pageHeight / 4;
            pageHalf = _pageHeight / 2;
            var _loc4 = Math.sqrt(x * x + y * y);
            var _loc5 = Math.asin(y / _loc4);
            var _loc6 = Math.tan(_loc5) * _pageWidth;
            if (y > 0 && y > _pageHeight / 2)
            {
                y = _pageHeight / 2;
            } // end if
            if (y < 0 && y < -_pageHeight / 2)
            {
                y = -_pageHeight / 2;
            } // end if
            oy = sy = _loc6;
            ax = pages._xmouse < 0 ? (-_pageWidth / 2) : (_pageWidth / 2);
            var _loc3 = _pageHeight / 2 - y;
            ay = y + (Math.random() * 2 * _loc3 - _loc3) / 2;
            offs = -_pageWidth;
            var _loc2 = 0;
            if (x < 0 && page > 0)
            {
                pages.flip.p3._x = 0;
                noFlip = noPage && gskip ? (gtarget == 0) : (this.checkCover(page, -1));
                if (!(preflip && noFlip))
                {
                    if (gskip)
                    {
                        this.setPages(gtarget, gtarget + 1, page, page + 1);
                    }
                    else
                    {
                        this.setPages(page - 2, page - 1, page, page + 1);
                    } // end if
                } // end else if
                _loc2 = -1;
            } // end if
            if (x > 0 && page < maxpage)
            {
                pages.flip.p3._x = _pageWidth;
                noFlip = noPage && gskip ? (gtarget == maxpage) : (this.checkCover(page, 1));
                if (!(preflip && noFlip))
                {
                    if (gskip)
                    {
                        this.setPages(page, gtarget, page + 1, gtarget + 1);
                    }
                    else
                    {
                        this.setPages(page, page + 2, page + 1, page + 3);
                    } // end if
                } // end else if
                _loc2 = 1;
            } // end if
            if (noFlip && preflip)
            {
                _loc2 = 0;
                preflip = false;
                return (false);
            } // end if
            if (_loc2)
            {
                anim._visible = false;
                flip = true;
                flipOff = false;
                ox = sx = _loc2 * _pageWidth;
                pages.flip.setMask(pages.mask);
                aadd = _loc2 * (_pageWidth / (gflip ? (5) : (10)));
                aflip = true;
                pages.flip.fmask._x = _pageWidth;
                if (preflip)
                {
                    oy = sy = pages._ymouse < 0 ? (-_pageHeight / 2) : (_pageHeight / 2);
                } // end if
                r0 = Math.sqrt((sy + _pageHeight / 2) * (sy + _pageHeight / 2) + _pageWidth * _pageWidth);
                r1 = Math.sqrt((_pageHeight / 2 - sy) * (_pageHeight / 2 - sy) + _pageWidth * _pageWidth);
                pageN = pages.flip.p2.page;
                pageO = pages.flip.p3;
                this.oef();
                return (true);
            } // end if
        }
        else
        {
            return (false);
        } // end else if
    } // End of the function
    function getm()
    {
        if (aflip && !preflip)
        {
            x = ax;
            y = ay;
        }
        else
        {
            x = pages._xmouse;
            y = pages._ymouse;
        } // end else if
    } // End of the function
    function gotoPageDirectly(page)
    {
        this.gotoPage(page, true);
    } // End of the function
    function gotoPage(i, skip)
    {
        if (skip == undefined)
        {
            skip = false;
        } // end if
        i = this.getPageNumber(i);
        gskip = skip == undefined ? (false) : (skip);
        if (i < 0)
        {
            return (false);
        } // end if
        var _loc3 = int(page / 2);
        var _loc2 = int(i / 2);
        if (_loc3 != _loc2 && canflip && !gflip)
        {
            if (_loc3 < _loc2)
            {
                gdir = 1;
                gpage = _loc2 - _loc3 - 1;
            }
            else
            {
                gdir = -1;
                gpage = _loc3 - _loc2 - 1;
            } // end else if
            gflip = true;
            if (gskip)
            {
                (gtarget = _loc2 * 2, gpage = 0);
            } // end if
            this.autoflip();
        }
        else
        {
            gskip = false;
        } // end else if
    } // End of the function
    function getPageNumber(i)
    {
        var _loc4 = false;
        for (var _loc2 = 1; _loc2 <= maxpage; ++_loc2)
        {
            if (i == pageNumber[_loc2])
            {
                i = _loc2;
                _loc4 = true;
                break;
            } // end if
        } // end of for
        if (_loc4)
        {
            return (i);
        }
        else
        {
            return (-1);
        } // end else if
    } // End of the function
    var _startPage = 1;
    var clickarea = 60;
    var autof_sq = 50;
    var _gotoSpeed = 2;
    var fspeed = 7;
    var cspeed = 2;
    var scale2Fit = false;
    var _shadow = 50;
    var _backColor = 3103931;
    var _backAlpha = true;
    var _numbering = "none";
    var _direction = "first to last";
    var _flipSound = "";
    var _pageFolder = "";
    var _loaderColor = 16777215;
    var canflip = true;
    var mcnt = 0;
    var gpage = 0;
    var gflip = false;
    var gdir = 0;
    var gskip = false;
    var gtarget = 0;
    var aflip = false;
    var flip = false;
    var flipOff = false;
    var flipOK = false;
    var noFlip = false;
    var rotz = -30;
    var preflip = false;
    var ctear = false;
    var tear = false;
    var teard = 0;
    var tlimit = 80;
    var removedPages = new Array();
    var mpx = 0;
    var mpy = 0;
    var sx = 0;
    var sy = 0;
    var x = 0;
    var y = 0;
    var ax = 0;
    var ay = 0;
    var acnt = 0;
    var aadd = 0;
    var aamp = 0;
    var AM = 1.745329E-002;
    var _pageWidth = 270;
    var _pageHeight = 350;
    var _xmlFile = "";
    var _pageList = new Array();
    var _loadOnDemand = false;
    var _display = false;
    var pageArr = ["pages.p1.page.pf.ph", "pages.p0.page.pf.ph", "pages.p4.page.pf.ph", "pages.p5.page.pf.ph", "pages.flip.p3.page.pf.ph", "pages.flip.p2.page.pf.ph"];
} // End of Class
