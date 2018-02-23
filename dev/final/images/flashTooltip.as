class flashTooltip extends MovieClip
{
    var bg, bdr, txt, __target, __get___targetInstanceName, __get__target, __text, __get__text, __html, __get__html, __fontFace, __get__fontFace, __useEmbeddedFont, __get__useEmbeddedFont, __fontSize, __get__fontSize, __fontColor, __get__fontColor, __image, __get__image, __imagePosition, __get__imagePosition, __align, __get__imageAlignment, __imgBuffer, __get__imageBuffer, __padding, __get__padding, __bgColor, __get__backgroundColor, __bgAlpha, __get__backgroundOpacity, __bdrThickness, __get__borderThickness, __bdrColor, __get__borderColor, __bdrAlpha, __get__borderOpacity, __autosize, __get__autosize, __cnrRadius, __get__cornerRadius, __anchor, __get__anchor, __pstn, __get__position, __xaxis, __get__xAxisOffset, __yaxis, __get__yAxisOffset, __lmtToStage, __get__limitToStage, __mouseStop, __get__appearOnMouseStop, __inEffect, __get__inEffect, __inEffectSpeed, __get__inEffectSpeed, __inEffectDelay, __get__inEffectDelay, __outEffect, __get__outEffect, __outEffectSpeed, __get__outEffectSpeed, __outEffectDelay, __get__outEffectDelay, __alertsound, __get__alertSound, __initBuffer, __get__initializationBuffer, __get__width, __width, __get__height, __height, __inEffectInterval, __outEffectInterval, __inEffectDelayInterval, __outEffectDelayInterval, _visible, _xscale, __beginScale, _rotation, __beginRotation, _alpha, __beginAlpha, _yscale, parent, initInterval, _height, _width, attachMovie, createEmptyMovieClip, img, createTextField, __imgHeight, __txtHeight, imgMask, txtXPos, txtYPos, bgXPos, bgYPos, bdrXPos, bdrYPos, _parent, _x, _y, __mouseInterval, __set___targetInstanceName, __set__alertSound, __set__anchor, __set__appearOnMouseStop, __set__autosize, __get__background, __set__backgroundColor, __set__backgroundOpacity, __get__border, __set__borderColor, __set__borderOpacity, __set__borderThickness, __set__cornerRadius, __set__fontColor, __set__fontFace, __set__fontSize, __set__height, __set__html, __set__image, __set__imageAlignment, __set__imageBuffer, __set__imagePosition, __set__inEffect, __set__inEffectDelay, __set__inEffectSpeed, __set__initializationBuffer, __set__limitToStage, __set__outEffect, __set__outEffectDelay, __set__outEffectSpeed, __set__padding, __set__position, __set__target, __set__text, __get__textfield, __set__useEmbeddedFont, __set__width, __set__xAxisOffset, __set__yAxisOffset;
    function flashTooltip()
    {
        super();
        this.init();
    } // End of the function
    function get background()
    {
        return (bg);
    } // End of the function
    function get border()
    {
        return (bdr);
    } // End of the function
    function get textfield()
    {
        return (txt);
    } // End of the function
    function set _targetInstanceName(val)
    {
        __target = val;
        this.invalidate();
        //return (this._targetInstanceName());
        null;
    } // End of the function
    function get _targetInstanceName()
    {
        return (__target);
    } // End of the function
    function set target(val)
    {
        __target = val;
        this.invalidate();
        //return (this.target());
        null;
    } // End of the function
    function get target()
    {
        return (__target);
    } // End of the function
    function set text(val)
    {
        __text = val;
        this.invalidate();
        //return (this.text());
        null;
    } // End of the function
    function get text()
    {
        return (__text);
    } // End of the function
    function set html(val)
    {
        __html = val;
        this.invalidate();
        //return (this.html());
        null;
    } // End of the function
    function get html()
    {
        return (__html);
    } // End of the function
    function set fontFace(val)
    {
        __fontFace = val;
        this.invalidate();
        //return (this.fontFace());
        null;
    } // End of the function
    function get fontFace()
    {
        return (__fontFace);
    } // End of the function
    function set useEmbeddedFont(val)
    {
        __useEmbeddedFont = val;
        this.invalidate();
        //return (this.useEmbeddedFont());
        null;
    } // End of the function
    function get useEmbeddedFont()
    {
        return (__useEmbeddedFont);
    } // End of the function
    function set fontSize(val)
    {
        __fontSize = Math.max(1, val);
        this.invalidate();
        //return (this.fontSize());
        null;
    } // End of the function
    function get fontSize()
    {
        return (__fontSize);
    } // End of the function
    function set fontColor(val)
    {
        __fontColor = val;
        this.invalidate();
        //return (this.fontColor());
        null;
    } // End of the function
    function get fontColor()
    {
        return (__fontColor);
    } // End of the function
    function set image(val)
    {
        __image = val;
        this.invalidate();
        //return (this.image());
        null;
    } // End of the function
    function get image()
    {
        return (__image);
    } // End of the function
    function set imagePosition(val)
    {
        __imagePosition = val;
        this.invalidate();
        //return (this.imagePosition());
        null;
    } // End of the function
    function get imagePosition()
    {
        return (__imagePosition);
    } // End of the function
    function set imageAlignment(val)
    {
        __align = val;
        this.invalidate();
        //return (this.imageAlignment());
        null;
    } // End of the function
    function get imageAlignment()
    {
        return (__align);
    } // End of the function
    function set imageBuffer(val)
    {
        __imgBuffer = Math.abs(val);
        this.invalidate();
        //return (this.imageBuffer());
        null;
    } // End of the function
    function get imageBuffer()
    {
        return (__imgBuffer);
    } // End of the function
    function set padding(val)
    {
        __padding = val;
        this.invalidate();
        //return (this.padding());
        null;
    } // End of the function
    function get padding()
    {
        return (__padding);
    } // End of the function
    function set backgroundColor(val)
    {
        __bgColor = val;
        this.invalidate();
        //return (this.backgroundColor());
        null;
    } // End of the function
    function get backgroundColor()
    {
        return (__bgColor);
    } // End of the function
    function set backgroundOpacity(val)
    {
        __bgAlpha = val;
        this.invalidate();
        //return (this.backgroundOpacity());
        null;
    } // End of the function
    function get backgroundOpacity()
    {
        return (__bgAlpha);
    } // End of the function
    function set borderThickness(val)
    {
        __bdrThickness = Math.max(0, val);
        this.invalidate();
        //return (this.borderThickness());
        null;
    } // End of the function
    function get borderThickness()
    {
        return (__bdrThickness);
    } // End of the function
    function set borderColor(val)
    {
        __bdrColor = val;
        this.invalidate();
        //return (this.borderColor());
        null;
    } // End of the function
    function get borderColor()
    {
        return (__bdrColor);
    } // End of the function
    function set borderOpacity(val)
    {
        __bdrAlpha = val;
        this.invalidate();
        //return (this.borderOpacity());
        null;
    } // End of the function
    function get borderOpacity()
    {
        return (__bdrAlpha);
    } // End of the function
    function set autosize(val)
    {
        __autosize = val;
        this.invalidate();
        //return (this.autosize());
        null;
    } // End of the function
    function get autosize()
    {
        return (__autosize);
    } // End of the function
    function set cornerRadius(val)
    {
        __cnrRadius = Math.max(0, val);
        this.invalidate();
        //return (this.cornerRadius());
        null;
    } // End of the function
    function get cornerRadius()
    {
        return (__cnrRadius);
    } // End of the function
    function set anchor(val)
    {
        __anchor = val;
        this.invalidate();
        //return (this.anchor());
        null;
    } // End of the function
    function get anchor()
    {
        return (__anchor);
    } // End of the function
    function set position(val)
    {
        __pstn = val;
        this.invalidate();
        //return (this.position());
        null;
    } // End of the function
    function get position()
    {
        return (__pstn);
    } // End of the function
    function set xAxisOffset(val)
    {
        __xaxis = val;
        this.invalidate();
        //return (this.xAxisOffset());
        null;
    } // End of the function
    function get xAxisOffset()
    {
        return (__xaxis);
    } // End of the function
    function set yAxisOffset(val)
    {
        __yaxis = val;
        this.invalidate();
        //return (this.yAxisOffset());
        null;
    } // End of the function
    function get yAxisOffset()
    {
        return (__yaxis);
    } // End of the function
    function set limitToStage(val)
    {
        __lmtToStage = val;
        //return (this.limitToStage());
        null;
    } // End of the function
    function get limitToStage()
    {
        return (__lmtToStage);
    } // End of the function
    function set appearOnMouseStop(val)
    {
        __mouseStop = val;
        //return (this.appearOnMouseStop());
        null;
    } // End of the function
    function get appearOnMouseStop()
    {
        return (__mouseStop);
    } // End of the function
    function set inEffect(val)
    {
        __inEffect = val.toLowerCase();
        //return (this.inEffect());
        null;
    } // End of the function
    function get inEffect()
    {
        return (__inEffect.substr(0, 1).toUpperCase() + __inEffect.substr(1));
    } // End of the function
    function set inEffectSpeed(val)
    {
        __inEffectSpeed = Math.max(0, val * 40);
        //return (this.inEffectSpeed());
        null;
    } // End of the function
    function get inEffectSpeed()
    {
        return (__inEffectSpeed);
    } // End of the function
    function set inEffectDelay(val)
    {
        __inEffectDelay = Math.max(0, val);
        //return (this.inEffectDelay());
        null;
    } // End of the function
    function get inEffectDelay()
    {
        return (__inEffectDelay);
    } // End of the function
    function set outEffect(val)
    {
        __outEffect = val.toLowerCase();
        //return (this.outEffect());
        null;
    } // End of the function
    function get outEffect()
    {
        return (__outEffect.substr(0, 1).toUpperCase() + __outEffect.substr(1));
    } // End of the function
    function set outEffectSpeed(val)
    {
        __outEffectSpeed = Math.max(0, val * 40);
        //return (this.outEffectSpeed());
        null;
    } // End of the function
    function get outEffectSpeed()
    {
        return (__outEffectSpeed);
    } // End of the function
    function set outEffectDelay(val)
    {
        __outEffectDelay = Math.max(0, val);
        //return (this.outEffectDelay());
        null;
    } // End of the function
    function get outEffectDelay()
    {
        return (__outEffectDelay);
    } // End of the function
    function set alertSound(val)
    {
        __alertsound = val;
        //return (this.alertSound());
        null;
    } // End of the function
    function get alertSound()
    {
        return (__alertsound);
    } // End of the function
    function set initializationBuffer(val)
    {
        __initBuffer = val;
        //return (this.initializationBuffer());
        null;
    } // End of the function
    function get initializationBuffer()
    {
        return (__initBuffer);
    } // End of the function
    function set width(val)
    {
        this.setSize(val, null);
        //return (this.width());
        null;
    } // End of the function
    function get width()
    {
        return (__width);
    } // End of the function
    function set height(val)
    {
        this.setSize(null, val);
        //return (this.height());
        null;
    } // End of the function
    function get height()
    {
        return (__height);
    } // End of the function
    function show()
    {
        __showing = true;
        __hiding = false;
        clearInterval(__inEffectInterval);
        clearInterval(__outEffectInterval);
        clearInterval(__inEffectDelayInterval);
        clearInterval(__outEffectDelayInterval);
        if (__alertsound.length > 0)
        {
            var _loc2 = new Sound(this);
            _loc2.attachSound(__alertsound);
            _loc2.start();
        } // end if
        _visible = true;
        switch (__inEffect)
        {
            case "none":
            {
                break;
            } 
            case "bounce":
            case "zoom":
            {
                __beginScale = _xscale < 100 ? (_xscale) : (0);
                break;
            } 
            case "spiral":
            {
                __beginScale = _xscale < 100 ? (_xscale) : (0);
                __beginRotation = _rotation < 360 ? (_rotation) : (0);
                break;
            } 
            case "spring":
            {
                __beginAlpha = _alpha < 100 ? (_alpha) : (0);
                __beginScale = _xscale < 100 ? (_xscale) : (0);
                break;
            } 
            default:
            {
                __beginAlpha = _alpha < 100 ? (_alpha) : (0);
                break;
            } 
        } // End of switch
        __inEffectTime = 0;
        __inEffectInterval = setInterval(this, "showTween", __inEffectDelay * 1000);
    } // End of the function
    function showTween()
    {
        var _loc2 = Math.max(1, __inEffectSpeed);
        clearInterval(__inEffectInterval);
        __inEffectInterval = setInterval(this, "showTween", 25);
        switch (__inEffect)
        {
            case "none":
            {
                _alpha = 100;
                _rotation = 0;
                _xscale = _yscale = 100;
                break;
            } 
            case "bounce":
            {
                _alpha = 100;
                _rotation = 0;
                _xscale = _yscale = this.bounceOut(__inEffectTime, __beginScale, 100 - __beginScale, _loc2);
                break;
            } 
            case "spiral":
            {
                _alpha = 100;
                _rotation = this.easeIn(__inEffectTime, __beginRotation, 360 - __beginRotation, _loc2);
                _xscale = _yscale = this.easeInOut(__inEffectTime, __beginScale, 100 - __beginScale, _loc2);
                break;
            } 
            case "spring":
            {
                _alpha = this.elasticOut(__inEffectTime, __beginAlpha, 100 - __beginAlpha, _loc2);
                _rotation = 0;
                _xscale = _yscale = this.elasticOut(__inEffectTime, __beginScale, 100 - __beginScale, _loc2);
                break;
            } 
            case "zoom":
            {
                _alpha = 100;
                _rotation = 0;
                _xscale = _yscale = this.easeInOut(__inEffectTime, __beginScale, 100 - __beginScale, _loc2);
                break;
            } 
            default:
            {
                _alpha = this.easeInOut(__inEffectTime, __beginAlpha, 100 - __beginAlpha, _loc2);
                _rotation = 0;
                _xscale = _yscale = 100;
                break;
            } 
        } // End of switch
        if (++__inEffectTime > _loc2)
        {
            __showing = false;
            clearInterval(__inEffectInterval);
        } // end if
    } // End of the function
    function hide()
    {
        __showing = false;
        __hiding = true;
        clearInterval(__inEffectInterval);
        clearInterval(__outEffectInterval);
        clearInterval(__inEffectDelayInterval);
        clearInterval(__outEffectDelayInterval);
        switch (__outEffect)
        {
            case "none":
            {
                break;
            } 
            case "bounce":
            case "zoom":
            {
                __beginScale = _xscale;
                break;
            } 
            case "spiral":
            {
                __beginRotation = _rotation;
                __beginScale = _xscale;
                break;
            } 
            case "spring":
            {
                __beginAlpha = _alpha;
                __beginScale = _xscale;
                break;
            } 
            default:
            {
                __beginAlpha = _alpha;
                break;
            } 
        } // End of switch
        __outEffectTime = 0;
        __outEffectInterval = setInterval(this, "hideTween", __outEffectDelay * 1000);
    } // End of the function
    function hideTween()
    {
        var _loc2 = Math.max(1, __outEffectSpeed);
        clearInterval(__outEffectInterval);
        __outEffectInterval = setInterval(this, "hideTween", 25);
        switch (__outEffect)
        {
            case "none":
            {
                _alpha = 0;
                _rotation = 0;
                _xscale = _yscale = 0;
                break;
            } 
            case "bounce":
            {
                _alpha = 100;
                _rotation = 0;
                _xscale = _yscale = this.bounceOut(__outEffectTime, __beginScale, -__beginScale, _loc2);
                break;
            } 
            case "spiral":
            {
                _alpha = 100;
                _rotation = this.easeIn(__outEffectTime, __beginRotation, -360 + __beginRotation, _loc2);
                _xscale = _yscale = this.easeInOut(__outEffectTime, __beginScale, -__beginScale, _loc2);
                break;
            } 
            case "spring":
            {
                _alpha = this.elasticOut(__outEffectTime, __beginAlpha, -__beginAlpha, _loc2);
                _rotation = 0;
                _xscale = _yscale = this.elasticOut(__outEffectTime, __beginScale, -__beginScale, _loc2);
                break;
            } 
            case "zoom":
            {
                _alpha = 100;
                _rotation = 0;
                _xscale = _yscale = this.easeInOut(__outEffectTime, __beginScale, -__beginScale, _loc2);
                break;
            } 
            default:
            {
                _alpha = this.easeInOut(__outEffectTime, __beginAlpha, -__beginAlpha, _loc2);
                _xscale = _yscale = 100;
                break;
            } 
        } // End of switch
        if (++__outEffectTime > _loc2)
        {
            __hiding = false;
            _visible = false;
            clearInterval(__outEffectInterval);
        } // end if
    } // End of the function
    function init()
    {
        if (_global.isLivePreview)
        {
            bg._width = bdr._width = Stage.width;
            bg._height = bdr._height = Stage.height;
            var _loc3 = new Object();
            _loc3.parent = this;
            _loc3.onResize = function ()
            {
                parent.bg._width = parent.bdr._width = Stage.width;
                parent.bg._height = parent.bdr._height = Stage.height;
            };
            Stage.addListener(_loc3);
            _alpha = 25;
        }
        else
        {
            _visible = false;
            _alpha = 0;
            initInterval = setInterval(this, "processInit", __initBuffer * 1000);
        } // end else if
    } // End of the function
    function processInit()
    {
        clearInterval(initInterval);
        drawn = true;
        this.setSize(_width, _height);
    } // End of the function
    function setSize(wVal, hVal)
    {
        _xscale = _yscale = 100;
        if (wVal != null)
        {
            __width = wVal;
        } // end if
        if (hVal != null)
        {
            __height = hVal;
        } // end if
        this.invalidate();
    } // End of the function
    function invalidate()
    {
        if (drawn)
        {
            this.draw();
        } // end if
    } // End of the function
    function draw()
    {
        this.drawImg();
    } // End of the function
    function drawImg()
    {
        if (__image.length > 0)
        {
            if (__image.indexOf(".") < 0)
            {
                this.attachMovie(__image, "img", 3);
            }
            else
            {
                this.createEmptyMovieClip("img", 3);
                var _loc2 = new MovieClipLoader();
                _loc2.addListener(this);
                _loc2.loadClip(__image, img);
            } // end else if
        }
        else
        {
            this.createEmptyMovieClip("img", 3);
        } // end else if
        this.drawVis();
    } // End of the function
    function onLoadInit(target_mc)
    {
        this.drawVis();
    } // End of the function
    function drawVis()
    {
        var _loc9 = __bdrThickness + __padding;
        img._x = img._y = _loc9;
        if (txt == undefined)
        {
            this.createTextField("txt", 2, _loc9, _loc9, 0, 0);
        } // end if
        if (__autosize)
        {
            txt.wordWrap = false;
        }
        else
        {
            txt.wordWrap = true;
        } // end else if
        if (__text.length > 0)
        {
            txt._width = __width - _loc9 * 2;
            txt._height = __height - _loc9 * 2;
        } // end if
        txt.selectable = false;
        txt.multiline = true;
        txt.embedFonts = __useEmbeddedFont;
        var _loc26 = new TextFormat();
        _loc26.font = __fontFace;
        _loc26.size = __fontSize;
        _loc26.color = __fontColor;
        txt.setNewTextFormat(_loc26);
        if (this.containsHtml(__text))
        {
            txt.html = __html = true;
            txt.htmlText = __text;
        }
        else
        {
            txt.html = __html = false;
            txt.text = __text;
        } // end else if
        txt.autoSize = true;
        __imgHeight = __image.length > 0 ? (img._height) : (0);
        __txtHeight = __text.length > 0 ? (txt._height) : (0);
        if (__image.length <= 0 || __text.length <= 0)
        {
            __imgBuffer = 0;
        } // end if
        if (__autosize)
        {
            __width = Math.max(txt._width, img._width) + _loc9 * 2;
            __height = __txtHeight + __imgHeight + __imgBuffer + _loc9 * 2;
        } // end if
        var _loc2 = Math.round(Math.min(Math.min(__width, __height) / 2, __cnrRadius));
        var _loc30 = new Color(bg);
        _loc30.setRGB(__bgColor);
        var _loc29 = new Color(bdr);
        _loc29.setRGB(__bdrColor);
        bg._alpha = __bgAlpha;
        bdr._alpha = __bdrAlpha;
        bg.bg._x = __bdrThickness;
        bg.bg._y = __bdrThickness;
        bg.bg._width = __width - __bdrThickness * 2;
        bg.bg._height = __height - __bdrThickness * 2;
        bdr.bg._width = __width;
        bdr.bg._height = __height;
        var _loc8 = {x: _loc2, y: 0};
        var _loc18 = {x: __width - _loc2, y: 0};
        var _loc20 = {x: __width, y: 0};
        var _loc19 = {x: __width, y: _loc2};
        var _loc17 = {x: __width, y: __height - _loc2};
        var _loc25 = {x: __width, y: __height};
        var _loc24 = {x: _loc18.x, y: __height};
        var _loc28 = {x: _loc2, y: __height};
        var _loc23 = {x: 0, y: __height};
        var _loc22 = {x: 0, y: _loc17.y};
        var _loc27 = {x: 0, y: _loc2};
        var _loc21 = {x: 0, y: 0};
        var _loc6 = {x: _loc2, y: __bdrThickness};
        var _loc5 = {x: __bdrThickness, y: __bdrThickness};
        var _loc15 = {x: __bdrThickness, y: _loc2};
        var _loc14 = {x: __bdrThickness, y: _loc17.y};
        var _loc4 = {x: __bdrThickness, y: __height - __bdrThickness};
        var _loc13 = {x: _loc2, y: _loc4.y};
        var _loc12 = {x: _loc18.x, y: _loc4.y};
        var _loc3 = {x: __width - __bdrThickness, y: _loc4.y};
        var _loc11 = {x: _loc3.x, y: _loc17.y};
        var _loc10 = {x: _loc3.x, y: _loc2};
        var _loc7 = {x: _loc3.x, y: __bdrThickness};
        var _loc16 = {x: _loc18.x, y: __bdrThickness};
        if (imgMask != undefined)
        {
            imgMask.removeMovieClip();
        } // end if
        if (bg.mask != undefined)
        {
            bg.mask.removeMovieClip();
        } // end if
        if (bdr.mask != undefined)
        {
            bdr.mask.removeMovieClip();
        } // end if
        this.createEmptyMovieClip("imgMask", 4);
        imgMask.lineStyle();
        bg.createEmptyMovieClip("mask", bg.getNextHighestDepth());
        bg.mask.lineStyle();
        bdr.createEmptyMovieClip("mask", bdr.getNextHighestDepth());
        bdr.mask.lineStyle();
        imgMask.moveTo(_loc6.x, _loc6.y);
        imgMask.beginFill(255, 100);
        bg.mask.moveTo(_loc6.x, _loc6.y);
        bg.mask.beginFill(255, 100);
        bdr.mask.moveTo(_loc8.x, _loc8.y);
        bdr.mask.beginFill(255, 100);
        bdr.mask.lineTo(_loc18.x, _loc18.y);
        if (_loc2 > 0)
        {
            bdr.mask.curveTo(_loc20.x, _loc20.y, _loc19.x, _loc19.y);
        }
        else
        {
            bdr.mask.lineTo(_loc20.x, _loc20.y);
            bdr.mask.lineTo(_loc19.x, _loc19.y);
        } // end else if
        bdr.mask.lineTo(_loc17.x, _loc17.y);
        if (_loc2 > 0)
        {
            bdr.mask.curveTo(_loc25.x, _loc25.y, _loc24.x, _loc24.y);
        }
        else
        {
            bdr.mask.lineTo(_loc25.x, _loc25.y);
            bdr.mask.lineTo(_loc24.x, _loc24.y);
        } // end else if
        bdr.mask.lineTo(_loc28.x, _loc28.y);
        if (_loc2 > 0)
        {
            bdr.mask.curveTo(_loc23.x, _loc23.y, _loc22.x, _loc22.y);
        }
        else
        {
            bdr.mask.lineTo(_loc23.x, _loc23.y);
            bdr.mask.lineTo(_loc22.x, _loc22.y);
        } // end else if
        bdr.mask.lineTo(_loc27.x, _loc27.y);
        if (_loc2 > 0)
        {
            bdr.mask.curveTo(_loc21.x, _loc21.y, _loc8.x, _loc8.y);
        }
        else
        {
            bdr.mask.lineTo(_loc21.x, _loc21.y);
            bdr.mask.lineTo(_loc8.x, _loc8.y);
        } // end else if
        bdr.mask.lineTo(_loc6.x, _loc6.y);
        if (_loc2 - __bdrThickness > 0)
        {
            imgMask.curveTo(_loc5.x, _loc5.y, _loc15.x, _loc15.y);
            bg.mask.curveTo(_loc5.x, _loc5.y, _loc15.x, _loc15.y);
            bdr.mask.curveTo(_loc5.x, _loc5.y, _loc15.x, _loc15.y);
        }
        else
        {
            imgMask.lineTo(_loc5.x, _loc5.y);
            bg.mask.lineTo(_loc5.x, _loc5.y);
            bdr.mask.lineTo(_loc5.x, _loc5.y);
        } // end else if
        imgMask.lineTo(_loc14.x, _loc14.y);
        bg.mask.lineTo(_loc14.x, _loc14.y);
        bdr.mask.lineTo(_loc14.x, _loc14.y);
        if (_loc2 - __bdrThickness > 0)
        {
            imgMask.curveTo(_loc4.x, _loc4.y, _loc13.x, _loc13.y);
            bg.mask.curveTo(_loc4.x, _loc4.y, _loc13.x, _loc13.y);
            bdr.mask.curveTo(_loc4.x, _loc4.y, _loc13.x, _loc13.y);
        }
        else
        {
            imgMask.lineTo(_loc4.x, _loc4.y);
            bg.mask.lineTo(_loc4.x, _loc4.y);
            bdr.mask.lineTo(_loc4.x, _loc4.y);
        } // end else if
        imgMask.lineTo(_loc12.x, _loc12.y);
        bg.mask.lineTo(_loc12.x, _loc12.y);
        bdr.mask.lineTo(_loc12.x, _loc12.y);
        if (_loc2 - __bdrThickness > 0)
        {
            imgMask.curveTo(_loc3.x, _loc3.y, _loc11.x, _loc11.y);
            bg.mask.curveTo(_loc3.x, _loc3.y, _loc11.x, _loc11.y);
            bdr.mask.curveTo(_loc3.x, _loc3.y, _loc11.x, _loc11.y);
        }
        else
        {
            imgMask.lineTo(_loc3.x, _loc3.y);
            bg.mask.lineTo(_loc3.x, _loc3.y);
            bdr.mask.lineTo(_loc3.x, _loc3.y);
        } // end else if
        imgMask.lineTo(_loc10.x, _loc10.y);
        bg.mask.lineTo(_loc10.x, _loc10.y);
        bdr.mask.lineTo(_loc10.x, _loc10.y);
        if (_loc2 - __bdrThickness > 0)
        {
            imgMask.curveTo(_loc7.x, _loc7.y, _loc16.x, _loc16.y);
            bg.mask.curveTo(_loc7.x, _loc7.y, _loc16.x, _loc16.y);
            bdr.mask.curveTo(_loc7.x, _loc7.y, _loc16.x, _loc16.y);
        }
        else
        {
            imgMask.lineTo(_loc7.x, _loc7.y);
            bg.mask.lineTo(_loc7.x, _loc7.y);
            bdr.mask.lineTo(_loc7.x, _loc7.y);
        } // end else if
        imgMask.lineTo(_loc6.x, _loc6.y);
        bg.mask.lineTo(_loc6.x, _loc6.y);
        bdr.mask.lineTo(_loc6.x, _loc6.y);
        bdr.mask.lineTo(_loc8.x, _loc8.y);
        imgMask.endFill();
        bg.mask.endFill();
        bdr.mask.endFill();
        false;
        img.setMask(imgMask);
        bg.bg.setMask(bg.mask);
        bdr.bg.setMask(bdr.mask);
        txtXPos = _loc9;
        txtYPos = _loc9;
        bgXPos = 0;
        bgYPos = 0;
        bdrXPos = 0;
        bdrYPos = 0;
        __ready = true;
        this.size();
    } // End of the function
    function containsHtml(stringToCheck)
    {
        if (__html != undefined)
        {
            return (__html);
        }
        else
        {
            if (stringToCheck.indexOf("<") >= 0 && stringToCheck.indexOf(">") > stringToCheck.indexOf("<") && stringToCheck.indexOf("/") > stringToCheck.indexOf("<"))
            {
                return (true);
            } // end if
            return (false);
        } // end else if
    } // End of the function
    function size()
    {
        this.doLayout();
    } // End of the function
    function doLayout()
    {
        switch (__pstn.toLowerCase())
        {
            case "top left":
            {
                txt._x = Math.round(__align == "Left" ? (txtXPos - __width) : (__align == "Center" ? (-__width / 2 - txt._width / 2) : (-txtXPos - txt._width)));
                img._x = Math.round(__align == "Left" ? (txtXPos - __width) : (__align == "Center" ? (-__width / 2 - img._width / 2) : (-txtXPos - img._width)));
                bg._x = imgMask._x = bgXPos - __width;
                bdr._x = bdrXPos - __width;
                txt._y = __imagePosition == "Top" ? (txtYPos - __height + __imgHeight + __imgBuffer) : (txtYPos - __height);
                img._y = __imagePosition == "Top" ? (txtYPos - __height) : (txtYPos - __height + __txtHeight + __imgBuffer);
                bg._y = imgMask._y = bgYPos - __height;
                bdr._y = bdrYPos - __height;
                break;
            } 
            case "bottom right":
            {
                txt._x = Math.round(__align == "Left" ? (txtXPos) : (__align == "Center" ? (__width / 2 - txt._width / 2) : (__width - (txt._width + txtXPos))));
                img._x = Math.round(__align == "Left" ? (txtXPos) : (__align == "Center" ? (__width / 2 - img._width / 2) : (__width - (img._width + txtXPos))));
                bg._x = imgMask._x = bgXPos;
                bdr._x = bdrXPos;
                txt._y = __imagePosition == "Top" ? (txtYPos + __imgHeight + __imgBuffer) : (txtYPos);
                img._y = __imagePosition == "Top" ? (txtYPos) : (txtYPos + __txtHeight + __imgBuffer);
                bg._y = imgMask._y = bgYPos;
                bdr._y = bdrYPos;
                break;
            } 
            case "bottom left":
            {
                txt._x = Math.round(__align == "Left" ? (txtXPos - __width) : (__align == "Center" ? (-__width / 2 - txt._width / 2) : (-txtXPos - txt._width)));
                img._x = Math.round(__align == "Left" ? (txtXPos - __width) : (__align == "Center" ? (-__width / 2 - img._width / 2) : (-txtXPos - img._width)));
                bg._x = imgMask._x = bgXPos - __width;
                bdr._x = bdrXPos - __width;
                txt._y = __imagePosition == "Top" ? (txtYPos + __imgHeight + __imgBuffer) : (txtYPos);
                img._y = __imagePosition == "Top" ? (txtYPos) : (txtYPos + __txtHeight + __imgBuffer);
                bg._y = imgMask._y = bgYPos;
                bdr._y = bdrYPos;
                break;
            } 
            default:
            {
                txt._x = Math.round(__align == "Left" ? (txtXPos) : (__align == "Center" ? (__width / 2 - txt._width / 2) : (__width - (txt._width + txtXPos))));
                img._x = Math.round(__align == "Left" ? (txtXPos) : (__align == "Center" ? (__width / 2 - img._width / 2) : (__width - (img._width + txtXPos))));
                bg._x = imgMask._x = bgXPos;
                bdr._x = bdrXPos;
                txt._y = __imagePosition == "Top" ? (txtYPos - __height + __imgHeight + __imgBuffer) : (txtYPos - __height);
                img._y = __imagePosition == "Top" ? (txtYPos - __height) : (txtYPos - __height + __txtHeight + __imgBuffer);
                bg._y = imgMask._y = bgYPos - __height;
                bdr._y = bdrYPos - __height;
                break;
            } 
        } // End of switch
        this.doPosition();
    } // End of the function
    function doPosition(Void)
    {
        if (__target.length > 0)
        {
            var _loc3;
            var _loc2;
            if (__anchor.toLowerCase() == "mouse position")
            {
                _loc3 = Math.max(_parent[__target]._x, Math.min(_parent[__target]._x + _parent[__target]._width, _parent._xmouse));
                _loc2 = Math.max(_parent[__target]._y, Math.min(_parent[__target]._y + _parent[__target]._height, _parent._ymouse));
            }
            else if (__anchor.toLowerCase() == "target center")
            {
                _loc3 = _parent[__target]._x + _parent[__target]._width / 2;
                _loc2 = _parent[__target]._y + _parent[__target]._height / 2;
            }
            else
            {
                switch (__pstn.toLowerCase())
                {
                    case "top left":
                    {
                        _loc3 = _parent[__target]._x;
                        _loc2 = _parent[__target]._y;
                        break;
                    } 
                    case "bottom right":
                    {
                        _loc3 = _parent[__target]._x + _parent[__target]._width;
                        _loc2 = _parent[__target]._y + _parent[__target]._height;
                        break;
                    } 
                    case "bottom left":
                    {
                        _loc3 = _parent[__target]._x;
                        _loc2 = _parent[__target]._y + _parent[__target]._height;
                        break;
                    } 
                    default:
                    {
                        _loc3 = _parent[__target]._x + _parent[__target]._width;
                        _loc2 = _parent[__target]._y;
                        break;
                    } 
                } // End of switch
            } // end else if
            _loc3 = _loc3 + __xaxis;
            _loc2 = _loc2 + __yaxis;
            if (__lmtToStage)
            {
                var _loc5;
                var _loc8;
                var _loc7;
                var _loc6;
                switch (__pstn.toLowerCase())
                {
                    case "top left":
                    {
                        _loc5 = __height;
                        _loc8 = 0;
                        _loc7 = 0;
                        _loc6 = __width;
                        break;
                    } 
                    case "bottom right":
                    {
                        _loc5 = 0;
                        _loc8 = __width;
                        _loc7 = __height;
                        _loc6 = 0;
                        break;
                    } 
                    case "bottom left":
                    {
                        _loc5 = 0;
                        _loc8 = 0;
                        _loc7 = __height;
                        _loc6 = __width;
                        break;
                    } 
                    default:
                    {
                        _loc5 = __height;
                        _loc8 = __width;
                        _loc7 = 0;
                        _loc6 = 0;
                        break;
                    } 
                } // End of switch
                var _loc4 = {x: 0, y: 0};
                _parent.globalToLocal(_loc4);
                if (_loc3 < _loc4.x + _loc6)
                {
                    _loc3 = _loc4.x + _loc6;
                }
                else if (_loc3 > _loc4.x + Stage.width - _loc8)
                {
                    _loc3 = _loc4.x + Stage.width - _loc8;
                } // end else if
                if (_loc2 < _loc4.y + _loc5)
                {
                    _loc2 = _loc4.y + _loc5;
                }
                else if (_loc2 > _loc4.y + Stage.height - _loc7)
                {
                    _loc2 = _loc4.y + Stage.height - _loc7;
                } // end if
            } // end else if
            _x = Math.round(_loc3);
            _y = Math.round(_loc2);
        } // end if
    } // End of the function
    function onMouseMove()
    {
        if (drawn && __ready)
        {
            if (__target.length > 0)
            {
                if (__anchor.toLowerCase() == "mouse position")
                {
                    this.doPosition();
                } // end if
                clearInterval(__mouseInterval);
                var _loc3 = {x: _parent[__target]._x, y: _parent[__target]._y};
                _parent.localToGlobal(_loc3);
                if (_parent[__target].hitTest(_root._xmouse, _root._ymouse, true) || typeof(_parent[__target]) != "movieclip" && _root._xmouse > _loc3.x && _root._xmouse < _loc3.x + _parent[__target]._width && _root._ymouse > _loc3.y && _root._ymouse < _loc3.y + _parent[__target]._height)
                {
                    if (!__showing && (!_visible || __hiding))
                    {
                        if (__mouseStop)
                        {
                            __mouseInterval = setInterval(this, "showPause", 1000);
                        }
                        else
                        {
                            this.show();
                        } // end if
                    } // end else if
                }
                else if (!__hiding && (_visible || __showing))
                {
                    this.hide();
                } // end if
            } // end else if
            updateAfterEvent();
        } // end if
    } // End of the function
    function showPause()
    {
        clearInterval(__mouseInterval);
        this.show();
    } // End of the function
    function easeInOut(t, b, c, d)
    {
        t = t / (d / 2);
        if (t < 1)
        {
            return (c / 2 * t * t + b);
        } // end if
        return (-c / 2 * (--t * (t - 2) - 1) + b);
    } // End of the function
    function easeIn(t, b, c, d)
    {
        t = t / d;
        return (c * (t) * t + b);
    } // End of the function
    function elasticOut(t, b, c, d, a, p)
    {
        if (t == 0)
        {
            return (b);
        } // end if
        t = t / d;
        if (t == 1)
        {
            return (b + c);
        } // end if
        if (!p)
        {
            p = d * 3.000000E-001;
        } // end if
        if (!a || a < Math.abs(c))
        {
            a = c;
            var _loc7 = p / 4;
        }
        else
        {
            _loc7 = p / 6.283185E+000 * Math.asin(c / a);
        } // end else if
        return (a * Math.pow(2, -10 * t) * Math.sin((t * d - _loc7) * 6.283185E+000 / p) + c + b);
    } // End of the function
    function bounceOut(t, b, c, d)
    {
        t = t / d;
        if (t < 3.636364E-001)
        {
            return (c * (7.562500E+000 * t * t) + b);
        }
        else if (t < 7.272727E-001)
        {
            t = t - 5.454545E-001;
            return (c * (7.562500E+000 * (t) * t + 7.500000E-001) + b);
        }
        else if (t < 9.090909E-001)
        {
            t = t - 8.181818E-001;
            return (c * (7.562500E+000 * (t) * t + 9.375000E-001) + b);
        }
        else
        {
            t = t - 9.545455E-001;
            return (c * (7.562500E+000 * (t) * t + 9.843750E-001) + b);
        } // end else if
    } // End of the function
    var className = "flashTooltip";
    static var symbolOwner = flashTooltip;
    static var symbolName = "flashTooltip";
    var version = "1.0.0.0";
    var drawn = false;
    var __ready = false;
    var __inEffectTime = 0;
    var __outEffectTime = 0;
    var __showing = false;
    var __hiding = false;
} // End of Class
