
var hotGame = 1;
var type = "";
var totalRecord = 12;

jQuery(document).ready(function () {

    Loading.show();
    Loading.hide();

    if (gametype === "ge") {
        if (gameGE === "True") {
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gamePT === "True") {
            gametype = "pt";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameMG === "True") {
            gametype = "mg";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameSP === "True") {
            gametype = "sp";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameAG === "True") {
            gametype = "ag";
            GetSlotGame(gametype, 0, "NA", 1);
        }
    }
    else if (gametype === "pt") {
        if (gamePT === "True") {
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameGE === "True") {
            gametype = "ge";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameMG === "True") {
            gametype = "mg";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameSP === "True") {
            gametype = "sp";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameAG === "True") {
            gametype = "ag";
            GetSlotGame(gametype, 0, "NA", 1);
        }
    }
    else if (gametype === "mg") {
        if (gameMG === "True") {
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameGE === "True") {
            gametype = "ge";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gamePT === "True") {
            gametype = "pt";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameSP === "True") {
            gametype = "sp";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameAG === "True") {
            gametype = "ag";
            GetSlotGame(gametype, 0, "NA", 1);
        }
    }
    else if (gametype === "sp") {
        if (gameSP === "True") {
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameGE === "True") {
            gametype = "ge";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gamePT === "True") {
            gametype = "pt";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameMG === "True") {
            gametype = "mg";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameAG === "True") {
            gametype = "ag";
            GetSlotGame(gametype, 0, "NA", 1);
        }
    }
    else if (gametype === "ag") {
        if (gameAG === "True") {
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameGE === "True") {
            gametype = "ge";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gamePT === "True") {
            gametype = "pt";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameMG === "True") {
            gametype = "mg";
            GetSlotGame(gametype, 0, "NA", 1);
        }
        else if (gameSP === "True") {
            gametype = "sp";
            GetSlotGame(gametype, 0, "NA", 1);
        }
    }


    jQuery(".slots-game-tab div").removeClass("active");

    if (gametype == "ge") {
        jQuery("#tabge").addClass("active");
    }
    if (gametype == "pt") {
        jQuery("#tabpt").addClass("active");
    }
    if (gametype == "mg") {
        jQuery("#tabmg").addClass("active");
    }
    if (gametype == "sp") {
        jQuery("#tabsp").addClass("active");
    }
    if (gametype == "ag") {
        jQuery("#tabag").addClass("active");
    }

    //jQuery(".slots-pagination").on("click", function (event) {
    //    var page = event.target.text;  
    //    GetSlotGame(gametype, page - 1, type, hotGame);
    //})

    jQuery("#control-paging").pagination({
        itemsOnPage: totalRecord,
        displayedPages: 3,
        cssStyle: '',
        listStyle: 'slots-pagination',
        prevText: '<',
        nextText: '>',
        onPageClick: onPageClick
    });


    //

    //jQuery("#slotge").click(function () {
    //    gametype = "ge";
    //    jQuery(".slots-game-tab div").removeClass("active");
    //    jQuery(this).parent("div").addClass("active");
    //    GetSlotGame(gametype, 0, "NA", 1);
    //    jQuery(".slots-game-cnt a").removeClass("active");
    //    jQuery(".slots-game-cnt li:first-child a").addClass("active");
    //});

    jQuery("#slotge").on('click', function (event) {
        event.stopPropagation();
        event.preventDefault();
        
            gametype = "ge";
            jQuery(".slots-game-tab div").removeClass("active");
            jQuery(this).parent("div").addClass("active");
            GetSlotGame(gametype, 0, "NA", 1);
            jQuery(".slots-game-cnt a").removeClass("active");
            jQuery(".slots-game-cnt li:first-child a").addClass("active");

            jQuery("#slot-content").show();
            jQuery("#game-ag-fish").hide();
            jQuery(".m-slots-fish").hide();
    });



    jQuery("#slotpt").click(function () {
        gametype = "pt";
        jQuery(".slots-game-tab div").removeClass("active");
        jQuery(this).parent("div").addClass("active");
        GetSlotGame(gametype, 0, "NA", 1);
        jQuery(".slots-game-cnt a").removeClass("active");
        jQuery(".slots-game-cnt li:first-child a").addClass("active");

        jQuery("#slot-content").show();
        jQuery("#game-ag-fish").hide();
        jQuery(".m-slots-fish").hide();
    });

    jQuery("#slotmg").click(function () {
        gametype = "mg";
        jQuery(".slots-game-tab div").removeClass("active");
        jQuery(this).parent("div").addClass("active");
        GetSlotGame(gametype, 0, "NA", 1);

        jQuery(".slots-game-cnt a").removeClass("active");
        jQuery(".slots-game-cnt li:first-child a").addClass("active");

        jQuery("#slot-content").show();
        jQuery("#game-ag-fish").hide();
        jQuery(".m-slots-fish").hide();
    });

    jQuery("#slotspade").click(function () {
        gametype = "sp";
        jQuery(".slots-game-tab div").removeClass("active");
        jQuery(this).parent("div").addClass("active");
        GetSlotGame(gametype, 0, "NA", 1);

        jQuery(".slots-game-cnt a").removeClass("active");
        jQuery(".slots-game-cnt li:first-child a").addClass("active");

        jQuery("#slot-content").show();
        jQuery("#game-ag-fish").hide();
        jQuery(".m-slots-fish").hide();
    });

    jQuery("#slotsag").click(function () {
        gametype = "ag";
        jQuery(".slots-game-tab div").removeClass("active");
        jQuery(this).parent("div").addClass("active");        
        GetSlotGame(gametype, 0, "NA", 1);
        jQuery(".slots-game-cnt a").removeClass("active");
        jQuery(".slots-game-cnt li:first-child a").addClass("active");

        jQuery(".m-slots-fish").show();
        jQuery("#slot-content").show();
        jQuery("#game-ag-fish").hide();
    });

    jQuery(".m-slots-fish").click(function () {       
        jQuery(".slots-game-cnt a").removeClass("active");
        jQuery(".m-slots-fish a").addClass("active");
        jQuery("#slot-content").hide();
        jQuery("#game-ag-fish").show();
    });

    jQuery(".btn-search").click(function () {
        var text = jQuery("#txt-search").val();
        if (text != "") {
            Search(gametype, text);
        }
        else {
            GetSlotGame(gametype, 0, "NA", 1);
        }
    });


   


});

function onPageClick(pageNumber, event) {
    GetSlotGame(gametype, pageNumber - 1, type, hotGame);
}



function LoadAllGame(obj) {
    hotGame = 0;
    type = "";
    jQuery(".slots-game-cnt a").removeClass("active");
    jQuery(obj).addClass("active");
    GetSlotGame(gametype, 0, "", hotGame);
    jQuery("#slot-content").show();
    jQuery("#game-ag-fish").hide();
}


function LoadHotGame(obj) {
    hotGame = 1;
    type = "NA";
    jQuery(".slots-game-cnt a").removeClass("active");
    jQuery(obj).addClass("active");
    GetSlotGame(gametype, 0, "NA", 1);
    jQuery("#slot-content").show();
    jQuery("#game-ag-fish").hide();
}
function LoadVideoSlot(obj) {
    hotGame = 0;
    type = "VideoSlots";
    jQuery(".slots-game-cnt a").removeClass("active");
    jQuery(obj).addClass("active");
    GetSlotGame(gametype, 0, "VideoSlots", hotGame);
    jQuery("#slot-content").show();
    jQuery("#game-ag-fish").hide();
}
function LoadClassicSlot(obj) {
    type = "ClassicSlots";
    hotGame = 0;
    jQuery(".slots-game-cnt a").removeClass("active");
    jQuery(obj).addClass("active");
    GetSlotGame(gametype, 0, "ClassicSlots", hotGame);

    jQuery("#slot-content").show();
    jQuery("#game-ag-fish").hide();
}
function LoadTableSlot(obj) {
    type = "TableGames";
    hotGame = 0;
    jQuery(".slots-game-cnt a").removeClass("active");
    jQuery(obj).addClass("active");
    GetSlotGame(gametype, 0, "TableGames", hotGame);

    jQuery("#slot-content").show();
    jQuery("#game-ag-fish").hide();

}


function Search(gametype,text) {
    jQuery.ajax({
        cache: false,
        type: "POST",
        url: "sv.asmx/Search",
        data: { "type": gametype, "text": text, "html5": html5 },
        async: true,
        success: function (data) {
            var m = jQuery.parseJSON(data);
            jQuery(".lst-slots-game").html("");
            jQuery.each(m, function (key, value) {

                var name = value.name;
                var nameCN = value.namecn;

                if (name == value.namecn) {
                    nameCN = "&nbsp;";
                }               

                var id=value.id;
                if (gametype == "ag")
                    id = value.value;

                jQuery(".lst-slots-game").append("<div class=\"col-xs-6 col-md-4 col-lg-3\"><div class=\"slots-game-item\"><a onclick=\"OpenWindow('" + name + "','" + gametype + "','" + id + "')\" title=\"" + name + "\" href=\"javascript:void(0)\"><img class=\"lazy\" src=\"images/loading.gif\" data-original=\"resources/gamepreview/" + value.smallimage + "?t=000111\" alt=\"\" /></a><p>" + name + "</p><p>" + nameCN + "</p></div></div>");
                jQuery("img.lazy").lazyload();

                if (userId === "") {
                    var waterMask = "<span class=\"watermark\">Play Demo</span>";
                    if (lang != "en") {
                        waterMask = "<span class=\"watermark\">试玩游戏</span>";
                    }
                    jQuery(".slots-game-item a").append(waterMask);
                }


            });
            
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }
    });
}


function GetSlotGame(gametype, currentPage, type, hot) {

}

/*paging*/
function paging(currentPage, gameType, type, hot) {

}

/*loading*/
//jQuerybody = jQuery("#slot-content");



jQuery(document).on({ 
    ajaxStart: function () {
        //jQuerybody.addClass("loading");
        Loading.show();
    },
    ajaxStop: function () {
        Loading.hide();
        //jQuerybody.removeClass("loading");      
    }
});

/*!
 * MockJax - jQuery Plugin to Mock Ajax requests
 *
 * Version:  1.5.3
 * Released:
 * Home:   http://github.com/appendto/jquery-mockjax
 * Author:   Jonathan Sharp (http://jdsharp.com)
 * License:  MIT,GPL
 *
 * Copyright (c) 2011 appendTo LLC.
 * Dual licensed under the MIT or GPL licenses.
 * http://appendto.com/open-source-licenses
 */ (function (jQuery) {
     var _ajax = jQuery.ajax,
         mockHandlers = [],
         mockedAjaxCalls = [],
         CALLBACK_REGEX = /=\?(&|jQuery)/,
         jsc = (new Date()).getTime();


     // Parse the given XML string.
     function parseXML(xml) {
         if (window.DOMParser == undefined && window.ActiveXObject) {
             DOMParser = function () { };
             DOMParser.prototype.parseFromString = function (xmlString) {
                 var doc = new ActiveXObject('Microsoft.XMLDOM');
                 doc.async = 'false';
                 doc.loadXML(xmlString);
                 return doc;
             };
         }

         try {
             var xmlDoc = (new DOMParser()).parseFromString(xml, 'text/xml');
             if (jQuery.isXMLDoc(xmlDoc)) {
                 var err = jQuery('parsererror', xmlDoc);
                 if (err.length == 1) {
                     throw ('Error: ' + jQuery(xmlDoc).text());
                 }
             } else {
                 throw ('Unable to parse XML');
             }
             return xmlDoc;
         } catch (e) {
             var msg = (e.name == undefined ? e : e.name + ': ' + e.message);
             jQuery(document).trigger('xmlParseError', [msg]);
             return undefined;
         }
     }

     // Trigger a jQuery event
     function trigger(s, type, args) {
         (s.context ? jQuery(s.context) : jQuery.event).trigger(type, args);
     }

     // Check if the data field on the mock handler and the request match. This
     // can be used to restrict a mock handler to being used only when a certain
     // set of data is passed to it.
     function isMockDataEqual(mock, live) {
         var identical = true;
         // Test for situations where the data is a querystring (not an object)
         if (typeof live === 'string') {
             // Querystring may be a regex
             return jQuery.isFunction(mock.test) ? mock.test(live) : mock == live;
         }
         jQuery.each(mock, function (k) {
             if (live[k] === undefined) {
                 identical = false;
                 return identical;
             } else {
                 // This will allow to compare Arrays
                 if (typeof live[k] === 'object' && live[k] !== null) {
                     identical = identical && isMockDataEqual(mock[k], live[k]);
                 } else {
                     if (mock[k] && jQuery.isFunction(mock[k].test)) {
                         identical = identical && mock[k].test(live[k]);
                     } else {
                         identical = identical && (mock[k] == live[k]);
                     }
                 }
             }
         });

         return identical;
     }

     // See if a mock handler property matches the default settings
     function isDefaultSetting(handler, property) {
         return handler[property] === jQuery.mockjaxSettings[property];
     }

     // Check the given handler should mock the given request
     function getMockForRequest(handler, requestSettings) {
         // If the mock was registered with a function, let the function decide if we
         // want to mock this request
         if (jQuery.isFunction(handler)) {
             return handler(requestSettings);
         }

         // Inspect the URL of the request and check if the mock handler's url
         // matches the url for this ajax request
         if (jQuery.isFunction(handler.url.test)) {
             // The user provided a regex for the url, test it
             if (!handler.url.test(requestSettings.url)) {
                 return null;
             }
         } else {
             // Look for a simple wildcard '*' or a direct URL match
             var star = handler.url.indexOf('*');
             if (handler.url !== requestSettings.url && star === -1 || !new RegExp(handler.url.replace(/[-[\]{}()+?.,\\^jQuery|#\s]/g, "\\jQuery&").replace(/\*/g, '.+')).test(requestSettings.url)) {
                 return null;
             }
         }

         // Inspect the data submitted in the request (either POST body or GET query string)
         if (handler.data && requestSettings.data) {
             if (!isMockDataEqual(handler.data, requestSettings.data)) {
                 // They're not identical, do not mock this request
                 return null; a
             }
         }
         // Inspect the request type
         if (handler && handler.type && handler.type.toLowerCase() != requestSettings.type.toLowerCase()) {
             // The request type doesn't match (GET vs. POST)
             return null;
         }

         return handler;
     }

     // Process the xhr objects send operation
     function _xhrSend(mockHandler, requestSettings, origSettings) {

         // This is a substitute for < 1.4 which lacks jQuery.proxy
         var process = (function (that) {
             return function () {
                 return (function () {
                     var onReady;

                     // The request has returned
                     this.status = mockHandler.status;
                     this.statusText = mockHandler.statusText;
                     this.readyState = 4;

                     // We have an executable function, call it to give
                     // the mock handler a chance to update it's data
                     if (jQuery.isFunction(mockHandler.response)) {
                         mockHandler.response(origSettings);
                     }
                     // Copy over our mock to our xhr object before passing control back to
                     // jQuery's onreadystatechange callback
                     if (requestSettings.dataType == 'json' && (typeof mockHandler.responseText == 'object')) {
                         this.responseText = JSON.stringify(mockHandler.responseText);
                     } else if (requestSettings.dataType == 'xml') {
                         if (typeof mockHandler.responseXML == 'string') {
                             this.responseXML = parseXML(mockHandler.responseXML);
                             //in jQuery 1.9.1+, responseXML is processed differently and relies on responseText
                             this.responseText = mockHandler.responseXML;
                         } else {
                             this.responseXML = mockHandler.responseXML;
                         }
                     } else {
                         this.responseText = mockHandler.responseText;
                     }
                     if (typeof mockHandler.status == 'number' || typeof mockHandler.status == 'string') {
                         this.status = mockHandler.status;
                     }
                     if (typeof mockHandler.statusText === "string") {
                         this.statusText = mockHandler.statusText;
                     }
                     // jQuery 2.0 renamed onreadystatechange to onload
                     onReady = this.onreadystatechange || this.onload;

                     // jQuery < 1.4 doesn't have onreadystate change for xhr
                     if (jQuery.isFunction(onReady)) {
                         if (mockHandler.isTimeout) {
                             this.status = -1;
                         }
                         onReady.call(this, mockHandler.isTimeout ? 'timeout' : undefined);
                     } else if (mockHandler.isTimeout) {
                         // Fix for 1.3.2 timeout to keep success from firing.
                         this.status = -1;
                     }
                 }).apply(that);
             };
         })(this);

         if (mockHandler.proxy) {
             // We're proxying this request and loading in an external file instead
             _ajax({
                 global: false,
                 url: mockHandler.proxy,
                 type: mockHandler.proxyType,
                 data: mockHandler.data,
                 dataType: requestSettings.dataType === "script" ? "text/plain" : requestSettings.dataType,
                 complete: function (xhr) {
                     mockHandler.responseXML = xhr.responseXML;
                     mockHandler.responseText = xhr.responseText;
                     // Don't override the handler status/statusText if it's specified by the config
                     if (isDefaultSetting(mockHandler, 'status')) {
                         mockHandler.status = xhr.status;
                     }
                     if (isDefaultSetting(mockHandler, 'statusText')) {
                         mockHandler.statusText = xhr.statusText;
                     }

                     this.responseTimer = setTimeout(process, mockHandler.responseTime || 0);
                 }
             });
         } else {
             // type == 'POST' || 'GET' || 'DELETE'
             if (requestSettings.async === false) {
                 // TODO: Blocking delay
                 process();
             } else {
                 this.responseTimer = setTimeout(process, mockHandler.responseTime || 50);
             }
         }
     }

     // Construct a mocked XHR Object
     function xhr(mockHandler, requestSettings, origSettings, origHandler) {
         // Extend with our default mockjax settings
         mockHandler = jQuery.extend(true, {}, jQuery.mockjaxSettings, mockHandler);

         if (typeof mockHandler.headers === 'undefined') {
             mockHandler.headers = {};
         }
         if (mockHandler.contentType) {
             mockHandler.headers['content-type'] = mockHandler.contentType;
         }

         return {
             status: mockHandler.status,
             statusText: mockHandler.statusText,
             readyState: 1,
             open: function () { },
             send: function () {
                 origHandler.fired = true;
                 _xhrSend.call(this, mockHandler, requestSettings, origSettings);
             },
             abort: function () {
                 clearTimeout(this.responseTimer);
             },
             setRequestHeader: function (header, value) {
                 mockHandler.headers[header] = value;
             },
             getResponseHeader: function (header) {
                 // 'Last-modified', 'Etag', 'content-type' are all checked by jQuery
                 if (mockHandler.headers && mockHandler.headers[header]) {
                     // Return arbitrary headers
                     return mockHandler.headers[header];
                 } else if (header.toLowerCase() == 'last-modified') {
                     return mockHandler.lastModified || (new Date()).toString();
                 } else if (header.toLowerCase() == 'etag') {
                     return mockHandler.etag || '';
                 } else if (header.toLowerCase() == 'content-type') {
                     return mockHandler.contentType || 'text/plain';
                 }
             },
             getAllResponseHeaders: function () {
                 var headers = '';
                 jQuery.each(mockHandler.headers, function (k, v) {
                     headers += k + ': ' + v + "\n";
                 });
                 return headers;
             }
         };
     }

     // Process a JSONP mock request.
     function processJsonpMock(requestSettings, mockHandler, origSettings) {
         // Handle JSONP Parameter Callbacks, we need to replicate some of the jQuery core here
         // because there isn't an easy hook for the cross domain script tag of jsonp

         processJsonpUrl(requestSettings);

         requestSettings.dataType = "json";
         if (requestSettings.data && CALLBACK_REGEX.test(requestSettings.data) || CALLBACK_REGEX.test(requestSettings.url)) {
             createJsonpCallback(requestSettings, mockHandler, origSettings);

             // We need to make sure
             // that a JSONP style response is executed properly

             var rurl = /^(\w+:)?\/\/([^\/?#]+)/,
                 parts = rurl.exec(requestSettings.url),
                 remote = parts && (parts[1] && parts[1] !== location.protocol || parts[2] !== location.host);

             requestSettings.dataType = "script";
             if (requestSettings.type.toUpperCase() === "GET" && remote) {
                 var newMockReturn = processJsonpRequest(requestSettings, mockHandler, origSettings);

                 // Check if we are supposed to return a Deferred back to the mock call, or just
                 // signal success
                 if (newMockReturn) {
                     return newMockReturn;
                 } else {
                     return true;
                 }
             }
         }
         return null;
     }

     // Append the required callback parameter to the end of the request URL, for a JSONP request
     function processJsonpUrl(requestSettings) {
         if (requestSettings.type.toUpperCase() === "GET") {
             if (!CALLBACK_REGEX.test(requestSettings.url)) {
                 requestSettings.url += (/\?/.test(requestSettings.url) ? "&" : "?") + (requestSettings.jsonp || "callback") + "=?";
             }
         } else if (!requestSettings.data || !CALLBACK_REGEX.test(requestSettings.data)) {
             requestSettings.data = (requestSettings.data ? requestSettings.data + "&" : "") + (requestSettings.jsonp || "callback") + "=?";
         }
     }

     // Process a JSONP request by evaluating the mocked response text
     function processJsonpRequest(requestSettings, mockHandler, origSettings) {
         // Synthesize the mock request for adding a script tag
         var callbackContext = origSettings && origSettings.context || requestSettings,
             newMock = null;


         // If the response handler on the moock is a function, call it
         if (mockHandler.response && jQuery.isFunction(mockHandler.response)) {
             mockHandler.response(origSettings);
         } else {

             // Evaluate the responseText javascript in a global context
             if (typeof mockHandler.responseText === 'object') {
                 jQuery.globalEval('(' + JSON.stringify(mockHandler.responseText) + ')');
             } else {
                 jQuery.globalEval('(' + mockHandler.responseText + ')');
             }
         }

         // Successful response
         jsonpSuccess(requestSettings, callbackContext, mockHandler);
         jsonpComplete(requestSettings, callbackContext, mockHandler);

         // If we are running under jQuery 1.5+, return a deferred object
         if (jQuery.Deferred) {
             newMock = new jQuery.Deferred();
             if (typeof mockHandler.responseText == "object") {
                 newMock.resolveWith(callbackContext, [mockHandler.responseText]);
             } else {
                 newMock.resolveWith(callbackContext, [jQuery.parseJSON(mockHandler.responseText)]);
             }
         }
         return newMock;
     }


     // Create the required JSONP callback function for the request
     function createJsonpCallback(requestSettings, mockHandler, origSettings) {
         var callbackContext = origSettings && origSettings.context || requestSettings;
         var jsonp = requestSettings.jsonpCallback || ("jsonp" + jsc++);

         // Replace the =? sequence both in the query string and the data
         if (requestSettings.data) {
             requestSettings.data = (requestSettings.data + "").replace(CALLBACK_REGEX, "=" + jsonp + "jQuery1");
         }

         requestSettings.url = requestSettings.url.replace(CALLBACK_REGEX, "=" + jsonp + "jQuery1");


         // Handle JSONP-style loading
         window[jsonp] = window[jsonp] || function (tmp) {
             data = tmp;
             jsonpSuccess(requestSettings, callbackContext, mockHandler);
             jsonpComplete(requestSettings, callbackContext, mockHandler);
             // Garbage collect
             window[jsonp] = undefined;

             try {
                 delete window[jsonp];
             } catch (e) { }

             if (head) {
                 head.removeChild(script);
             }
         };
     }

     // The JSONP request was successful
     function jsonpSuccess(requestSettings, callbackContext, mockHandler) {
         // If a local callback was specified, fire it and pass it the data
         if (requestSettings.success) {
             requestSettings.success.call(callbackContext, mockHandler.responseText || "", status, {});
         }

         // Fire the global callback
         if (requestSettings.global) {
             trigger(requestSettings, "ajaxSuccess", [{},
             requestSettings]);
         }
     }

     // The JSONP request was completed
     function jsonpComplete(requestSettings, callbackContext) {
         // Process result
         if (requestSettings.complete) {
             requestSettings.complete.call(callbackContext, {}, status);
         }

         // The request was completed
         if (requestSettings.global) {
             trigger("ajaxComplete", [{},
             requestSettings]);
         }

         // Handle the global AJAX counter
         if (requestSettings.global && !--jQuery.active) {
             jQuery.event.trigger("ajaxStop");
            
         }
     }


     // The core jQuery.ajax replacement.
     function handleAjax(url, origSettings) {
         var mockRequest, requestSettings, mockHandler;

         // If url is an object, simulate pre-1.5 signature
         if (typeof url === "object") {
             origSettings = url;
             url = undefined;
         } else {
             // work around to support 1.5 signature
             origSettings.url = url;
         }

         // Extend the original settings for the request
         requestSettings = jQuery.extend(true, {}, jQuery.ajaxSettings, origSettings);

         // Iterate over our mock handlers (in registration order) until we find
         // one that is willing to intercept the request
         for (var k = 0; k < mockHandlers.length; k++) {
             if (!mockHandlers[k]) {
                 continue;
             }

             mockHandler = getMockForRequest(mockHandlers[k], requestSettings);
             if (!mockHandler) {
                 // No valid mock found for this request
                 continue;
             }

             mockedAjaxCalls.push(requestSettings);

             // If logging is enabled, log the mock to the console
             jQuery.mockjaxSettings.log(mockHandler, requestSettings);


             if (requestSettings.dataType === "jsonp") {
                 if ((mockRequest = processJsonpMock(requestSettings, mockHandler, origSettings))) {
                     // This mock will handle the JSONP request
                     return mockRequest;
                 }
             }


             // Removed to fix #54 - keep the mocking data object intact
             //mockHandler.data = requestSettings.data;

             mockHandler.cache = requestSettings.cache;
             mockHandler.timeout = requestSettings.timeout;
             mockHandler.global = requestSettings.global;

             copyUrlParameters(mockHandler, origSettings);

             (function (mockHandler, requestSettings, origSettings, origHandler) {
                 mockRequest = _ajax.call(jQuery, jQuery.extend(true, {}, origSettings, {
                     // Mock the XHR object
                     xhr: function () {
                         return xhr(mockHandler, requestSettings, origSettings, origHandler);
                     }
                 }));
             })(mockHandler, requestSettings, origSettings, mockHandlers[k]);

             return mockRequest;
         }

         // We don't have a mock request
         if (jQuery.mockjaxSettings.throwUnmocked === true) {
             throw ('AJAX not mocked: ' + origSettings.url);
         } else { // trigger a normal request
             return _ajax.apply(jQuery, [origSettings]);
         }
     }

     /**
      * Copies URL parameter values if they were captured by a regular expression
      * @param {Object} mockHandler
      * @param {Object} origSettings
      */
     function copyUrlParameters(mockHandler, origSettings) {
         //parameters aren't captured if the URL isn't a RegExp
         if (!(mockHandler.url instanceof RegExp)) {
             return;
         }
         //if no URL params were defined on the handler, don't attempt a capture
         if (!mockHandler.hasOwnProperty('urlParams')) {
             return;
         }
         var captures = mockHandler.url.exec(origSettings.url);
         //the whole RegExp match is always the first value in the capture results
         if (captures.length === 1) {
             return;
         }
         captures.shift();
         //use handler params as keys and capture resuts as values
         var i = 0,
             capturesLength = captures.length,
             paramsLength = mockHandler.urlParams.length,
             //in case the number of params specified is less than actual captures
             maxIterations = Math.min(capturesLength, paramsLength),
             paramValues = {};
         for (i; i < maxIterations; i++) {
             var key = mockHandler.urlParams[i];
             paramValues[key] = captures[i];
         }
         origSettings.urlParams = paramValues;
     }


     // Public

     jQuery.extend({
         ajax: handleAjax
     });

     jQuery.mockjaxSettings = {
         //url:        null,
         //type:       'GET',
         log: function (mockHandler, requestSettings) {
             if (mockHandler.logging === false || (typeof mockHandler.logging === 'undefined' && jQuery.mockjaxSettings.logging === false)) {
                 return;
             }
             if (window.console && console.log) {
                 var message = 'MOCK ' + requestSettings.type.toUpperCase() + ': ' + requestSettings.url;
                 var request = jQuery.extend({}, requestSettings);

                 if (typeof console.log === 'function') {
                     console.log(message, request);
                 } else {
                     try {
                         console.log(message + ' ' + JSON.stringify(request));
                     } catch (e) {
                         console.log(message);
                     }
                 }
             }
         },
         logging: true,
         status: 200,
         statusText: "OK",
         responseTime: 500,
         isTimeout: false,
         throwUnmocked: false,
         contentType: 'text/plain',
         response: '',
         responseText: '',
         responseXML: '',
         proxy: '',
         proxyType: 'GET',

         lastModified: null,
         etag: '',
         headers: {
             etag: 'IJF@H#@923uf8023hFO@I#H#',
             'content-type': 'text/plain'
         }
     };

     jQuery.mockjax = function (settings) {
         var i = mockHandlers.length;
         mockHandlers[i] = settings;
         return i;
     };
     jQuery.mockjaxClear = function (i) {
         if (arguments.length == 1) {
             mockHandlers[i] = null;
         } else {
             mockHandlers = [];
         }
         mockedAjaxCalls = [];
     };
     jQuery.mockjax.handler = function (i) {
         if (arguments.length == 1) {
             return mockHandlers[i];
         }
     };
     jQuery.mockjax.mockedAjaxCalls = function () {
         return mockedAjaxCalls;
     };
 })(jQuery);

 function NewGuid() {
     var sGuid = "";
     for (var i = 0; i < 32; i++) {
         sGuid += Math.floor(Math.random() * 0xF).toString(0xF);
     }
     return sGuid;
 }




/*Popup*/
 function OpenWindow(name, gametype, id) {    
     var query = "";
     jQuery.ajax({
         cache: false,
         type: "POST",
         url: "sv.asmx/GenerateToken",
         data: { "user": userId, "gamecode": id, "gametype": gametype },
         async: false,
         success: function (data) {
             if (gametype === "ge") {
                 query = "yslot.aspx?gameid=" + id + "&lang=" + lang + "&user=" + userId + "&token=" + data;
             }
             if (gametype === "pt") {
                 query = "pt.aspx?gameid=" + id + "&lang=" + lang + "&user=" + userId + "&token=" + data;
             }
             if (gametype === "mg") {
                 query = "mg.aspx?gameid=" + id + "&lang=" + lang + "&user=" + userId + "&token=" + data;
             }
             if (gametype === "sp") {
                 query = "sp.aspx?gameid=" + id + "&lang=" + lang + "&user=" + userId + "&token=" + data;
             }
             if (gametype === "ag") {
                 query = "ag.aspx?gameid=" + id + "&lang=" + lang + "&user=" + userId + "&token=" + data;
             }
         },
         error: function (xhr, ajaxOptions, thrownError) {
             alert("opps wrong!");
         }
     });

     var h = 800;

     if (gametype === "ag") {
         h = 1000;
     }

     if (query != "") {
         var l = (screen.width - h) / 2;
         var t = (screen.height - 600) / 2;
         winprops = 'resizable=1, height=' + 605 + ',width=' + (h + 5) + ',top=' + t + ',left=' + l + 'w,scrollbars=1';
         var f = window.open(query, name, winprops);
     }        
 }