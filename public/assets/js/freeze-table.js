(function($,window){"use strict";var FreezeTable=function(element,options){this.$tableWrapper=$(element).first();this.options=options||{};this.namespace=this.options.namespace||"freeze-table";this.callback;this.shadow;this.fastMode;this.backgroundColor;this.$table=this.$tableWrapper.children("table");this.$headTableWrap;this.$columnTableWrap;this.$columnHeadTableWrap;this.$scrollBarWrap;this.fixedNavbarHeight;this.isWindowScrollX=false;this.headWrapClass="clone-head-table-wrap";this.columnWrapClass="clone-column-table-wrap";this.columnHeadWrapClass="clone-column-head-table-wrap";this.scrollBarWrapClass="clone-scroll-bar-wrap";this.init();return this};FreezeTable.prototype.init=function(){if(!this.$table.length){throw"The element must contain a table dom"}if(this.options==="update"){this.destroy();this.options=this.$tableWrapper.data("freeze-table-data")}else if(this.options==="resize"){this.options=this.$tableWrapper.data("freeze-table-data");this.namespace=this.options.namespace||this.namespace;this.resize();return}else{this.$tableWrapper.data("freeze-table-data",this.options)}var options=this.options;var freezeHead=typeof options.freezeHead!=="undefined"?options.freezeHead:true;var freezeColumn=typeof options.freezeColumn!=="undefined"?options.freezeColumn:true;var freezeColumnHead=typeof options.freezeColumnHead!=="undefined"?options.freezeColumnHead:true;var scrollBar=typeof options.scrollBar!=="undefined"?options.scrollBar:false;var fixedNavbar=options.fixedNavbar||".navbar-fixed-top";var callback=options.callback||null;this.namespace=this.options.namespace||this.namespace;this.shadow=typeof options.shadow!=="undefined"?options.shadow:false;this.fastMode=typeof options.fastMode!=="undefined"?options.fastMode:false;this.backgroundColor=typeof options.backgroundColor!=="undefined"?options.backgroundColor:"white";this.fixedNavbarHeight=fixedNavbar?$(fixedNavbar).outerHeight()||0:0;if(this.isInit()){this.destroy()}this.$tableWrapper.css("height","100%").css("min-height","100%").css("max-height","100%");if(freezeHead){this.buildHeadTable()}if(freezeColumn){this.buildColumnTable();this.$tableWrapper.css("overflow-x","scroll")}if(freezeColumnHead&&freezeHead&&freezeColumn){this.buildColumnHeadTable()}if(scrollBar){this.buildScrollBar()}var detectWindowScroll=function(){if($(window).scrollLeft()>0){this.isWindowScrollX=true;if(this.$headTableWrap){this.$headTableWrap.css("visibility","hidden")}if(this.$columnTableWrap){this.$columnTableWrap.css("visibility","hidden")}if(this.$columnHeadTableWrap){this.$columnHeadTableWrap.css("visibility","hidden")}if(this.$scrollBarWrap){this.$scrollBarWrap.css("visibility","hidden")}}else{this.isWindowScrollX=false}}.bind(this);$(window).on("scroll."+this.namespace,function(){detectWindowScroll()});this.resize();if(typeof callback==="function"){callback()}};FreezeTable.prototype.buildHeadTable=function(){var that=this;var $headTable=this.clone(this.$table);if(this.fastMode){var $headTable=this.simplifyHead($headTable)}var headWrapStyles=this.options.headWrapStyles||null;this.$headTableWrap=$('<div class="'+this.headWrapClass+'"></div>').append($headTable).css("position","fixed").css("overflow","hidden").css("visibility","hidden").css("top",0+this.fixedNavbarHeight).css("z-index",2);if(this.shadow){this.$headTableWrap.css("box-shadow","0px 6px 10px -5px rgba(159, 159, 160, 0.8)")}if(headWrapStyles&&typeof headWrapStyles==="object"){$.each(headWrapStyles,function(key,value){that.$headTableWrap.css(key,value)})}this.$tableWrapper.append(this.$headTableWrap);this.$tableWrapper.on("scroll."+this.namespace,function(){that.$headTableWrap.scrollLeft($(this).scrollLeft())});$(window).on("scroll."+this.namespace,function(){var topPosition=$(window).scrollTop()+that.fixedNavbarHeight;if(that.$table.offset().top-1<=topPosition&&that.$table.offset().top+that.$table.outerHeight()-1>=topPosition){that.$headTableWrap.css("visibility","visible")}else{that.$headTableWrap.css("visibility","hidden")}});$(window).on("resize."+this.namespace,function(){that.$headTableWrap.css("width",that.$tableWrapper.width());that.$headTableWrap.css("height",that.$table.find("thead").outerHeight())})};FreezeTable.prototype.buildColumnTable=function(){var that=this;var columnWrapStyles=this.options.columnWrapStyles||null;var columnNum=this.options.columnNum||1;var columnKeep=typeof this.options.columnKeep!=="undefined"?this.options.columnKeep:false;var defaultColumnBorderWidth=this.shadow?0:1;var columnBorderWidth=typeof this.options.columnBorderWidth!=="undefined"?this.options.columnBorderWidth:defaultColumnBorderWidth;var $columnTable=this.clone(this.$table);this.$columnTableWrap=$('<div class="'+this.columnWrapClass+'"></div>').append($columnTable).css("position","fixed").css("overflow","hidden").css("visibility","hidden").css("z-index",1);if(this.shadow){this.$columnTableWrap.css("box-shadow","6px 0px 10px -5px rgba(159, 159, 160, 0.8)")}if(columnWrapStyles&&typeof columnWrapStyles==="object"){$.each(columnWrapStyles,function(key,value){that.$columnTableWrap.css(key,value)})}this.$tableWrapper.append(this.$columnTableWrap);var align=function(){that.$columnTableWrap.css("top",that.$table.offset().top-$(window).scrollTop())};if(columnKeep){this.$columnTableWrap.css("visibility","visible")}else{this.$tableWrapper.on("scroll."+this.namespace,function(){if(that.isWindowScrollX)return;if($(this).scrollLeft()>0){that.$columnTableWrap.css("visibility","visible")}else{that.$columnTableWrap.css("visibility","hidden")}})}$(window).on("resize."+this.namespace,function(){$columnTable.width(that.$table.width());var width=0+columnBorderWidth;for(var i=1;i<=columnNum;i++){var th=that.$table.find("th:nth-child("+i+")").outerWidth();var addWidth=th>0?th:that.$table.find("td:nth-child("+i+")").outerWidth();width+=addWidth}that.$columnTableWrap.width(width);align()});$(window).on("scroll."+this.namespace,function(){align()})};FreezeTable.prototype.buildColumnHeadTable=function(){var that=this;this.$columnHeadTableWrap=this.clone(this.$headTableWrap);if(this.fastMode){this.$columnHeadTableWrap=this.simplifyHead(this.$columnHeadTableWrap)}var columnHeadWrapStyles=this.options.columnHeadWrapStyles||null;this.$columnHeadTableWrap.removeClass(this.namespace).addClass(this.columnHeadWrapClass).css("z-index",3);if(this.shadow){this.$columnHeadTableWrap.css("box-shadow","none")}if(columnHeadWrapStyles&&typeof columnHeadWrapStyles==="object"){$.each(columnHeadWrapStyles,function(key,value){this.$columnHeadTableWrap.css(key,value)})}this.$tableWrapper.append(this.$columnHeadTableWrap);var detect=function(){var topPosition=$(window).scrollTop()+that.fixedNavbarHeight;if(that.$table.offset().top-1<=topPosition&&that.$table.offset().top+that.$table.outerHeight()-1>=topPosition&&that.$tableWrapper.scrollLeft()>0){that.$columnHeadTableWrap.css("visibility","visible")}else{that.$columnHeadTableWrap.css("visibility","hidden")}};$(window).on("scroll."+this.namespace,function(){detect()});this.$tableWrapper.on("scroll."+this.namespace,function(){if(that.isWindowScrollX)return;detect()});$(window).on("resize."+this.namespace,function(){that.$columnHeadTableWrap.find("> table").css("width",that.$table.width());that.$columnHeadTableWrap.css("width",that.$columnTableWrap.width());that.$columnHeadTableWrap.css("height",that.$table.find("thead").outerHeight())})};FreezeTable.prototype.buildScrollBar=function(){var that=this;var theadHeight=this.$table.find("thead").outerHeight();var $scrollBarContainer=$('<div class="'+this.scrollBarWrapClass+'"></div>').css("width",this.$table.width()).css("height",1);this.$scrollBarWrap=$('<div class="'+this.scrollBarWrapClass+'"></div>').css("position","fixed").css("overflow-x","scroll").css("visibility","hidden").css("bottom",0).css("z-index",2).css("width",this.$tableWrapper.width()).css("height",20);this.$scrollBarWrap.append($scrollBarContainer);this.$tableWrapper.append(this.$scrollBarWrap);this.$scrollBarWrap.on("scroll."+this.namespace,function(){that.$tableWrapper.scrollLeft($(this).scrollLeft())});this.$tableWrapper.on("scroll."+this.namespace,function(){that.$scrollBarWrap.scrollLeft($(this).scrollLeft())});$(window).on("scroll."+this.namespace,function(){var bottomPosition=$(window).scrollTop()+$(window).height()-theadHeight+that.fixedNavbarHeight;if(that.$table.offset().top-1<=bottomPosition&&that.$table.offset().top+that.$table.outerHeight()-1>=bottomPosition){that.$scrollBarWrap.css("visibility","visible")}else{that.$scrollBarWrap.css("visibility","hidden")}});$(window).on("resize."+this.namespace,function(){$scrollBarContainer.css("width",that.$table.width());that.$scrollBarWrap.css("width",that.$tableWrapper.width())})};FreezeTable.prototype.clone=function(element){var $clone=$(element).clone().removeAttr("id");if(this.backgroundColor){$clone.css("background-color",this.backgroundColor)}return $clone};FreezeTable.prototype.simplifyHead=function(table){var that=this;var $headTable=$(table);$headTable.find("> tr, > tbody, > tfoot").remove();$.each($headTable.find("> thead > tr:nth-child(1) >"),function(key,value){var width=that.$table.find("> thead > tr:nth-child(1) > :nth-child("+parseInt(key+1)+")").outerWidth();$(this).css("width",width)});return $headTable};FreezeTable.prototype.isInit=function(){if(this.$tableWrapper.find("."+this.headWrapClass).length)return true;if(this.$tableWrapper.find("."+this.columnWrapClass).length)return true;if(this.$tableWrapper.find("."+this.columnHeadWrapClass).length)return true;if(this.$tableWrapper.find("."+this.scrollBarWrapClass).length)return true;return false};FreezeTable.prototype.unbind=function(){$(window).off("resize."+this.namespace);$(window).off("scroll."+this.namespace);this.$tableWrapper.off("scroll."+this.namespace)};FreezeTable.prototype.destroy=function(){this.unbind();this.$tableWrapper.find("."+this.headWrapClass).remove();this.$tableWrapper.find("."+this.columnWrapClass).remove();this.$tableWrapper.find("."+this.columnHeadWrapClass).remove();this.$tableWrapper.find("."+this.scrollBarWrapClass).remove()};FreezeTable.prototype.resize=function(){$(window).trigger("resize."+this.namespace);$(window).trigger("scroll."+this.namespace);this.$tableWrapper.trigger("scroll."+this.namespace);return true};FreezeTable.prototype.update=function(){this.options="update";this.init();return this};window.FreezeTable=FreezeTable;$.fn.freezeTable=function(options){if(this.length===1){return new FreezeTable(this,options)}else if(this.length>1){var result=[];this.each(function(){result.push(new FreezeTable(this,options))});return result}return false}})(jQuery,window);