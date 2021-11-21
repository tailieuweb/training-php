/*
*
* Project: WaltzerJS
* URL: http://www.waltzer-js.co.uk
* Author: Scott Carmichael
* Version: 1.1
*
* Copyright (c) 2014 Scott Carmichael
* Dual Licensed under GPL(http://www.gnu.org/licenses/gpl.html) & MIT (http://www.opensource.org/licenses/mit-license.php)
*
*/

;(function ($, window, document, undefined) {

    $.fn.waltzer = function(config){

        //Plugin Defaults
        var defaults = {
                    developerMode: false,
                    vertical: false,
                    scroll: 1,
                    offset: 0,
                    circular: true,
                    auto: false,
                    autoPause : 1000,
                    speed: 300,
                    easing: 'swing',
                    navBtns: true,
                    leftNavBtn: 'left-nav-btn',
                    rightNavBtn: 'right-nav-btn',
                    pager: false,
                    onCreate: null,
                    onComplete: null,
                    onForwardComplete: null,
                    onBackwardComplete: null
                }

        function plugin(container, config){

            //Compile Plugin Options
            this.options = $.extend({}, defaults, config);

            //Gather Core Values
            this.coreValues(container);

            //Install Methods
            this.utilities(this);
            this.actions(this);

            //Run Plugin
            this.init(this);

        };

        plugin.prototype.coreValues = function(container){

            this.$container = container;
            this.$items = this.$container.children().not('.'+this.options.leftNavBtn+', .'+this.options.rightNavBtn);

            //Create and Cache Navigation Buttons
            if(this.options.navBtns){
                $('<div class="'+this.options.leftNavBtn+'"></div>').appendTo(this.$container);
                $('<div class="'+this.options.rightNavBtn+'"></div>').appendTo(this.$container);
                this.$buttons = this.$container.find( '.'+this.options.leftNavBtn+', .'+this.options.rightNavBtn );
            }

            this.itemCount = this.$items.length;
            if(this.options.vertical){
                this.containerWidth = this.$container.outerHeight(false);
                this.itemWidth = this.$items.outerHeight(true);
                this.itemMarginWidth =  this.itemWidth - this.$items.outerHeight(false);
                this.containerHeight = this.containerWidth;
            } else {
                this.containerWidth = this.$container.outerWidth(false);
                this.itemWidth = this.$items.outerWidth(true);
                this.itemMarginWidth =  this.itemWidth - this.$items.outerWidth(false);
                this.containerHeight = this.$items.outerHeight(false);
            }
            this.innerWrapperWidth = (this.itemWidth * this.itemCount);
            this.innerWrapperPos = 0;
            this.speed = this.options.scroll * this.options.speed;
            this.scrollWidth = this.itemWidth*this.options.scroll;
            this.pageCount = 1;

            //Turn Circular Off For Pager Display
            this.options.circular = this.options.pager ? false : this.options.circular;

            //Test Scroll and Reset Value if Unsuitable
            if(this.itemCount % this.options.scroll != 0 || ((this.containerWidth / this.itemWidth)+1) < this.options.scroll){
                for(i=this.options.scroll-1;i>=1;i--){
                    if(this.itemCount % i == 0 && ((this.containerWidth / this.itemWidth)+1) > i){
                       this.options.scroll = i;
                       break;
                    }
                }
            }
        }

        plugin.prototype.utilities = function(self){

            //Reorder List Items
            this.cutAndPaste = function(direction){
                if(direction == 'forward'){
                    for(i=0;i<this.options.scroll;i++){
                         this.innerWrapper.append(this.$items[i]);
                    }
                } else if(direction == 'backward'){
                    for(i=this.itemCount;i>=this.itemCount-this.options.scroll;i--){
                         this.innerWrapper.prepend(this.$items[i]);
                    }
                }
            }
            //Refresh List Order After Item Move
            this.refreshItemList = function(){
                return this.$items = this.innerWrapper.children('div.item');
            }

            //Page Count
            this.updatePageCount = function(direction, amount){
                amount = amount == undefined || amount == false ? 1 : amount;
                for(i=0; i<amount; i++){
                    if(direction == 'forward'){
                        if(this.pageCount < this.itemCount / this.options.scroll){
                            this.pageCount++;
                        } else {
                            this.pageCount = 1;
                        }
                    } else if(direction = 'backward'){
                        if(this.pageCount > 1){
                            this.pageCount--;
                        } else {
                            this.pageCount = this.itemCount / this.options.scroll;
                        }
                    }
                }

                //Update Pager Active State
                if(this.options.pager){
                    this.$container.find('.pager').children('span').removeClass('active');
                    this.$container.find('.pager').children('span[data-button ='+this.pageCount+']').addClass('active');
                }
            }


            //Activate Auto Scrolling
            this.addAuto = function(){
                if( this.options.auto ){
                    return setInterval(function(){
                                self.move('forward');
                            }, this.options.autoPause );
                }
                return false;
            }

            this.removeAuto = function(){
                return this.options.auto ? clearInterval(self.autoScroll) : false;
            }

            //Trigger Multiple Events
            this.eventTrigger = function(events){
                if( typeof events == 'string' ){
                    self.$container.trigger(events);
                } else {
                    for(i=0; i < events.length; i++){
                        self.$container.trigger(events[i]);
                    }
                }
            }

            this.animateFunction = function(position, direction, amount){
                this.innerWrapper.animate(position, this.speed, this.easing, function(){
                    self.updatePageCount(direction, amount);
                    self.directionCallBack.resolve(direction);
                    self.completeCallBack.resolve('completed');
                    //Completion Events
                    self.eventTrigger([direction+'Complete', 'moved']);
                });
            }

        }

        plugin.prototype.actions = function(self){

            this.animate = function(direction, amount){

                //Return if Animation in Progress
                if(this.innerWrapper.is(':animated')){
                    return false;
                }

                var posObject = {},
                    offset = this.options.vertical == true ? 'top' : 'left',
                    amount = amount == undefined || amount == false ? 1 : amount,
                    scrollDistance = this.scrollWidth * amount;

                //Refresh Deferreds
                this.directionCallBack = $.Deferred();
                this.completeCallBack = $.Deferred();

                //Set Scroll Width
                posObject[offset] = direction == 'forward' ? '-='+scrollDistance : '+='+scrollDistance;

                //Fire Forward Event
                this.eventTrigger(direction);

                if(direction == 'forward'){

                    if((this.innerWrapperWidth + this.innerWrapperPos[offset]) > this.containerWidth+this.itemWidth){

                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);

                    } else if(this.options.circular){

                        //Cut and Move Item
                        this.cutAndPaste('forward');
                        //Reset InnerWrapper Position
                        this.innerWrapper.css(offset, this.innerWrapperPos[offset]+this.scrollWidth);

                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);

                        //Refresh Item List Order
                        this.refreshItemList();

                    } else if(!this.options.circular) {

                        posObject[offset] = 0;

                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);

                    }


                } else if(direction == 'backward'){

                    if(this.innerWrapperPos[offset] < 0){

                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);

                    } else if(this.options.circular){

                        //Cut and Move Item
                        this.cutAndPaste('backward');
                        //Reset InnerWrapper Position
                        this.innerWrapper.css(offset, this.innerWrapperPos[offset]-this.scrollWidth);
                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);
                        //Refresh Item List Order
                        this.refreshItemList();

                    } else if(!this.options.circular) {

                        if(this.scrollWidth < this.containerWidth){
                            var marginWidth = this.containerWidth;
                            while(marginWidth>0){
                                marginWidth -= this.itemWidth;
                            }
                            posObject[offset] =  (this.innerWrapperWidth - this.containerWidth+marginWidth)*-1;
                        } else {
                            posObject[offset] = (this.innerWrapperWidth - this.scrollWidth)*-1
                        }
                        //Animate InnerWrapper
                        this.animateFunction(posObject, direction, amount);

                    }

                }

                //Initialize Callbacks
                this.initCallBacks(this.directionCallBack, this.completeCallBack);

            },

            this.initCallBacks = function(direction, complete){

                //Forward/Backward Completion Callback
                if(self.options.onForwardComplete || self.options.onBackwardComplete){
                    direction.done(function(data){
                        if(data == 'forward'){
                            if(typeof self.options.onForwardComplete == 'function'){
                                self.options.onForwardComplete.call(self);
                            }
                        } else if(data == 'backward'){
                            //backward Complete Callback
                            if(typeof self.options.onBackwardComplete == 'function'){
                                self.options.onBackwardComplete.call(self);
                            }
                        }
                    });
                }

                //Completion Callback
                if(typeof self.options.onComplete == 'function'){
                    complete.done(function(data){
                        self.options.onComplete.call(self);
                    });
                }

            }

        }

        plugin.prototype.init = function(self){

            //Wrap items in Container
            if(this.options.vertical){
                this.$items.wrapAll('<div class="innerWrapper" style="position:relative; height:' + this.innerWrapperWidth + 'px;"></div>');
            } else {
                this.$items.wrapAll('<div class="innerWrapper" style="position:relative; width:' + this.innerWrapperWidth + 'px;"></div>');
            }

            //Capture InnerWrapper
            this.innerWrapper = this.$container.children('div.innerWrapper');
            //Create Mask
            this.innerWrapper.wrap('<div class="mask" style="position:relative; overflow:hidden; width:100%; height:'+this.containerHeight+'px;"></div>');

            //Offset Alter Array
            if(this.options.offset != 0){
                for(i=0;i<this.options.offset;i++){
                        this.innerWrapper.append(this.$items[i]);
                }
                //Refresh Item List Order
                this.refreshItemList();
            }

            //onCreate Callback Function
            if(this.options.onCreate && typeof this.options.onCreate == 'function'){
                this.options.onCreate.call(this);
            }

            //Pager
            if(this.options.pager){

                //Build and Add Pager
                this.$container.append('<div class="pager"></div>');
                var count = this.itemCount / this.options.scroll;
                for( i=0; i < count; i++ ){
                    var state = this.pageCount == i + 1 ? 'active' : '' ;
                    this.$container.find('.pager').append('<span class="'+state+'" data-button="' + (i + 1) +'"><span>' + (i + 1) + '</span></span>');
                }

                //Pager Click Event
                this.$container.on('click', '.pager > span', function(){

                    var currentPage = self.pageCount,
                        newPage = $(this).attr('data-button');

                    if(currentPage < newPage || currentPage > newPage){
                        if(currentPage < newPage){
                            self.move('forward', (newPage - currentPage));
                        } else {
                            self.move('backward', (newPage - currentPage) * -1);
                        }
                    }

                });

            }


            //Auto Scrolling
            if( this.options.auto ){
                this.autoScroll = this.addAuto();
            }

            //Log Plugin Instance
            if(this.options.developerMode){
                console.log(this);
            }

            //Add Navigation Button Events
            if(this.options.navBtns){
                this.$buttons.on('click', function(){
                    if($(this).attr('class') == self.options.leftNavBtn){
                        self.move('backward');
                    } else if($(this).attr('class') == self.options.rightNavBtn) {
                        self.move('forward');
                    }
                });
            }

            //Disable Auto Scroll on Mouse Hover
            if(this.options.auto){
                this.$container.on({
                    mouseover: function(){
                        return self.removeAuto();
                    },
                    mouseout: function(){
                        return self.autoScroll = self.addAuto();
                    }
                });
            }

        }

    //Method Wrappers

        //Destroy
        plugin.prototype.destroy = function(container){
            this.$container.find('.mask').after(this.$items).remove();
            if(this.options.navBtns){
                this.$buttons.off();
            }
        }

        //Move
        plugin.prototype.move = function(direction, amount){
            this.innerWrapperPos = this.innerWrapper.position();
            this.animate(direction, amount);
        }

        this.each(function(){
            if (typeof config === "string") {
                //Get Plugin Instance
                $this = $(this).data('plugin_waltzerJS');
                //Apply Method
                if( config == 'forward' || config == 'backward' ){
                    $this.move.call($this, config);
                } else if( config == 'stop' ) {
                    $this.removeAuto();
                } else if( config == 'start' ) {
                    $this.autoScroll = $this.addAuto();
                } else if( config == 'destroy' ) {
                    $this[config].call($this);
                }
            } else if (!$.data( $(this), 'plugin_waltzerJS' )) {
                $(this).data('plugin_waltzerJS', new plugin($(this), config) );
            }
        });

        //Preserve Chaining
        return this;

    }

})(jQuery, window, document);