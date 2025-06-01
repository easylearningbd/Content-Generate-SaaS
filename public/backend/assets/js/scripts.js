!(function (NioApp) {
  "use strict";

  /* Custom Menu (sidebar/header) */
  let menu = {
    classes: {
        main: 'nk-menu',
        item:'nk-menu-item',
        link:'nk-menu-link',
        toggle: 'nk-menu-toggle',
        sub: 'nk-menu-sub',
        subparent: 'has-sub',
        active: 'active',
        current: 'current-page'
    },
  };
  let sidebar = {
    classes:{
      base: 'nk-sidebar',
      toggle: 'sidebar-toggle',
      toggleActive: 'active',
      active: 'sidebar-active',
      overlay: 'sidebar-overlay',
      body: 'sidebar-shown',
      compact: 'is-compact',
      compactToggle: 'compact-toggle',
      compactToggleActive: 'active',
      compactBody:'sidebar-compact'
    },
    break: {
      main: NioApp.body.dataset.sidebarCollapse ? eval(`NioApp.Break.${NioApp.body.dataset.sidebarCollapse}`) : NioApp.Break.lg,
    }
  };

NioApp.Sidebar = {
  show: function(toggle,target) {
    toggle.forEach(toggleItem => {
      toggleItem.classList.add(sidebar.classes.toggleActive);
    })
    target.classList.add(sidebar.classes.active);
    NioApp.body.classList.add(sidebar.classes.body);
    let overalyTemplate = `<div class='${sidebar.classes.overlay}'></div>`
    target.insertAdjacentHTML('beforebegin', overalyTemplate);
  },
  hide: function(toggle,target) {
      toggle.forEach(toggleItem => {
        toggleItem.classList.remove(sidebar.classes.toggleActive);
      })
      target.classList.remove(sidebar.classes.active);
      NioApp.body.classList.remove(sidebar.classes.body);
      let overlay = document.querySelector(`.${sidebar.classes.overlay}`);
      setTimeout(() => {
        overlay && overlay.remove();
      }, 300);
  },
  compact: function(toggle,target) {
    toggle.classList.toggle(sidebar.classes.compactToggleActive);
    target.classList.toggle(sidebar.classes.compact);
    NioApp.body.classList.toggle(sidebar.classes.compactBody);
  },
  init : function() {
    let targetSl = document.querySelector(`.${sidebar.classes.base}`);
    let toggleSl = document.querySelectorAll(`.${sidebar.classes.toggle}`);
    let compactSl = document.querySelector(`.${sidebar.classes.compactToggle}`);
    toggleSl.forEach(item => {
      item.addEventListener("click", function(e){
        e.preventDefault();
        if(sidebar.break.main > NioApp.Win.width){
          if(!targetSl.classList.contains(sidebar.classes.active)){
              NioApp.Sidebar.show(toggleSl,targetSl);
          }else{
              NioApp.Sidebar.hide(toggleSl,targetSl);
          }
        }
      });
  
      window.addEventListener("resize", function(e){
        if(sidebar.break.main < NioApp.Win.width){
          NioApp.Sidebar.hide(toggleSl,targetSl);
        }
      });
  
      document.addEventListener("mouseup", function(e){
        if(e.target.closest(`.${sidebar.classes.base}`) === null){
          NioApp.Sidebar.hide(toggleSl,targetSl);
        }
      });
      
    })
    //init Compact Mode
    if(compactSl){
      compactSl.addEventListener("click", function(e){
        e.preventDefault();
        if(sidebar.break.main < NioApp.Win.width){
          NioApp.Sidebar.compact(compactSl,targetSl);
        }
      });
    }
  },
  dropdownLoad:function(elm){
    let parent = elm.parentElement;
    if(!parent.classList.contains(menu.classes.subparent)){
        parent.classList.add(menu.classes.subparent);
    }
  },
  dropdownToggle:function(elm){
    let parent = elm.parentElement;
    let nextelm = elm.nextElementSibling;
    let speed = nextelm.children.length > 5 ? 400 + nextelm.children.length * 10 : 400;
    if(!parent.classList.contains(menu.classes.active)){
    parent.classList.add(menu.classes.active);
      NioApp.SlideDown(nextelm,speed);
    }else{
    parent.classList.remove(menu.classes.active);
      NioApp.SlideUp(nextelm,speed);
    }
  },
  closeSiblings:function(elm){
    let parent = elm.parentElement;
    let siblings = parent.parentElement.children;
    Array.from(siblings).forEach(item => {
    if(item !== parent){
        item.classList.remove(menu.classes.active);
        if(item.classList.contains(menu.classes.subparent)){
        let subitem = item.querySelectorAll(`.${menu.classes.sub}`);
        subitem.forEach(child => {
            child.parentElement.classList.remove(menu.classes.active);
            NioApp.SlideUp(child,400);
        })
        }
    }
    });
  },
  dropdownInit:function (){
    const elm = document.querySelectorAll(`.${menu.classes.toggle}`);
    elm.forEach(item => {
        NioApp.Sidebar.dropdownLoad(item);
        item.addEventListener("click", function(e){
            e.preventDefault();
            NioApp.Sidebar.dropdownToggle(item);
            NioApp.Sidebar.closeSiblings(item);
        });
    })
  }
}

  /* Add some class to current link */
  NioApp.CurrentLink = function (selector, parent, submenu, base, active, intoView) {
    let elm = document.querySelectorAll(selector);
    let currentURL = document.location.href,
      removeHash = currentURL.substring(0, (currentURL.indexOf("#") == -1) ? currentURL.length : currentURL.indexOf("#")),
      removeQuery = removeHash.substring(0, (removeHash.indexOf("?") == -1) ? removeHash.length : removeHash.indexOf("?")),
      fileName = removeQuery;

    elm.forEach(function (item) {
      var selfLink = item.getAttribute('href');
      if (fileName.match(selfLink)) {
        let parents = NioApp.getParents(item, `.${base}`, parent);
        parents.forEach(parentElemets => {
          parentElemets.classList.add(...active);
          let subItem = parentElemets.querySelector(`.${submenu}`);
          subItem !== null && (subItem.style.display = "block")
        })
        intoView && item.scrollIntoView({ block: "end" })
      } else {
        item.parentElement.classList.remove(...active);
      }
    })
  }

  /* Pristine - Form Validation */
  NioApp.Addons.pristine = function (elem, live) {
    
    let config = {
      parent : "form-control-wrap",
      error : "form-error",
      success : "form-sucess",
      message : "form-error-message",
      messageTag : "span"
    }

    const pristine = new Pristine(elem, {
      classTo: config.parent,
      errorClass: config.error,
      successClass: config.success,
      errorTextParent: config.parent,
      errorTextTag: config.messageTag,
      errorTextClass: config.message
    }, live);

    return pristine;
  }
  /* Isotope - Filter Options */
  NioApp.Addons.Filter = function (elem,childSelector) {
    var qsRegex;
    var elm = document.querySelectorAll(elem);
    elm.forEach((item)=> {
      let animation = item.dataset.animation === "true" ? 
        {
          hiddenStyle: {
            opacity: 0,
            transform: 'scale(0.001)'
          },
          visibleStyle: {
            opacity: 1,
            transform: 'scale(1)'
          }
        }
      : {
        hiddenStyle: {
          opacity: 0
        },
        visibleStyle: {
          opacity: 1
        }
      };
      if( typeof(item) != 'undefined' && item != null ){
        var iso = new Isotope( item, {
          itemSelector: childSelector,
          layoutMode: 'fitRows',
          filter: function( itemElem ) {
            return qsRegex ? itemElem.textContent.match( qsRegex ) : true;
          },
          ...animation
        });

        var filterBtn = document.querySelectorAll('[data-filter]');
        console.log();
        filterBtn.forEach((btnItem)=> {
          btnItem.addEventListener( 'click', function( event ) {
            // only work with buttons
            if ( !matchesSelector( event.target, 'button' ) ) {
              return;
            }
            var filterValue = event.target.getAttribute('data-filter');
            iso.arrange({ filter: filterValue });
            filterBtn.forEach((allButtons)=> {
              allButtons.classList.remove('active')
            })
            btnItem.classList.add('active');
          });
        })

      }

    })

  }
  /* Clipboard - Copy Content */
  NioApp.Addons.Clipboard = function(selector) {
    let clipboardTrigger = document.querySelectorAll(selector);
    let options = {
      tooltip:{
        init: 'Copy',
        success : 'Copied',
      },
      icon:{
        init: 'copy',
        success: 'copy-fill',
      }
    }
    clipboardTrigger.forEach(item => {
      //init clipboard
      let clipboard = new ClipboardJS(item);
      //set markup
      let initMarkup = `<em class="icon ni ni-${options.icon.init}"></em><span>${options.tooltip.init}</span>`;
      let successMarkup = `<em class="icon ni ni-${options.icon.success}"></em><span>${options.tooltip.success}</span>`;
      item.innerHTML = initMarkup;
      //on-sucess
      clipboard.on("success", function(e){
        let target = e.trigger;
        target.innerHTML = successMarkup;
        target.classList.add("text-success");
        setTimeout(function(){
          target.classList.remove("text-success");
          target.innerHTML = initMarkup;
        }, 1000)
      });
    });
  }

  NioApp.Addons.Editor = function (selector, opt) {
    let elm = document.querySelectorAll(selector);
        if( elm != 'undefined' && elm != null ){
        elm.forEach(item => {
          let itemId = item.id;
          let toolbar = item.dataset.toolbar ? JSON.parse(item.dataset.toolbar) : true;
          let menubar = item.dataset.menubar ? JSON.parse(item.dataset.menubar) : true;
          let inline = item.dataset.inline ? JSON.parse(item.dataset.inline) : false;
          let height = item.dataset.height ? parseInt(item.dataset.height) : 300;
          tinymce.init({
              selector: `#${itemId}`,
              content_css: false,
              height: height,
              skin: false,
              branding: false,
              toolbar: toolbar,
              menubar: menubar,
              inline: inline,
              statusbar: false,
              promotion: false,
          });
        })
      }
  }
  
  /* Custom select js (Choices) */
  NioApp.Addons.Select = function(selector,options){
    let elm = document.querySelectorAll(selector);
    if( elm.length > 0 ){
      elm.forEach(item => {
        let search = item.dataset.search ? JSON.parse(item.dataset.search) : false;
        let sort = item.dataset.sort ? JSON.parse(item.dataset.sort) : false;
        let cross = item.dataset.cross ? JSON.parse(item.dataset.cross) : true;
        const choices = new Choices(item, {
          silent: true,
          allowHTML: false,
          searchEnabled: search,
          placeholder: true,
          placeholderValue: null,
          searchPlaceholderValue: 'Search',
          shouldSort: sort,
          removeItemButton: cross,
          itemSelectText: '',
        });
      })
    }
  }

  /* Custom tags js (Choices)  */
  NioApp.Addons.Tags = function(selector){
    let elm = document.querySelectorAll(selector);
    if( elm.length > 0 ){
      elm.forEach(item => {
        let cross = item.dataset.cross ? JSON.parse(item.dataset.cross) : true;
        let plainText = item.classList.contains('form-control-plaintext') && `choices__inner-plaintext`;
        let containerInner = `choices__inner ${plainText && plainText}`
        const choices = new Choices(item, {
          silent: true,
          allowHTML: false,
          placeholder: true,
          placeholderValue: null,
          removeItemButton: cross,
          classNames: {
            containerInner: containerInner,
          }
        });
      })
    }
  }

  /* DatePicker (vanillajs-datepicker) */
  NioApp.Addons.DatePicker = function(selector,opt){
    let elm = document.querySelectorAll(selector);
    if( elm.length > 0 ){
      elm.forEach(item => {
        let autohide = item.dataset.autoHide ? JSON.parse(item.dataset.autoHide) : true;
        let clearBtn = item.dataset.clearBtn ? JSON.parse(item.dataset.clearBtn) : false;
        let format = item.dataset.format ? item.dataset.format : 'mm/dd/yyyy';
        let maxView = item.dataset.maxView ? parseInt(item.dataset.maxView) : 3;
        let pickLevel = item.dataset.pickLevel ? parseInt(item.dataset.pickLevel) : 0;
        let startView = item.dataset.startView ? parseInt(item.dataset.startView) : 0;
        let title = item.dataset.title ? item.dataset.title : '';
        let todayBtn = item.dataset.todayBtn ? JSON.parse(item.dataset.todayBtn) : false;
        let todayBtnMode = item.dataset.todayBtnMode ? parseInt(item.dataset.todayBtnMode) : 0;
        let weekStart = item.dataset.weekStart ? parseInt(item.dataset.weekStart) : 0;
        let rangePicker = item.dataset.range ? true : false;
        let def = {
          buttonClass: 'btn btn-md',
          autohide: autohide,
          clearBtn: clearBtn,
          format: format,
          maxView: maxView,
          pickLevel: pickLevel,
          startView: startView,
          title: title,
          todayBtn: todayBtn,
          todayBtnMode: todayBtnMode,
          weekStart: weekStart
        },
        attr = opt ? opt : def;
        const datepicker = rangePicker ? new DateRangePicker(item, attr) : new Datepicker(item, attr);
      })
    }
  }

  NioApp.Custom.priceToggle = function (selector){
    let elm = document.querySelectorAll(selector);
    let content = document.querySelectorAll('.pricing-toggle-content');
    if (elm) {
      elm.forEach(item => {
        item.addEventListener('click', function(){
          let target = document.querySelectorAll(`.${item.dataset.target}`);
          console.log(target);
          if(!item.classList.contains('active')) {
            elm.forEach(item => {
              item.classList.remove('active');
            })
            item.classList.add('active');
            content.forEach(item => {
                item.classList.remove('active');
            })
            target.forEach(item => {
                item.classList.add('active');
            })
          }
        })
      })
    }
  }

  NioApp.Custom.showHidePassword = function (selector) {
    let elem = document.querySelectorAll(selector);
    if (elem) {
      elem.forEach(item => {
        item.addEventListener("click", function (e) {
          e.preventDefault();
          let target = document.getElementById(item.getAttribute("href"));

          if (target.type == "password") {
            target.type = "text";
            item.classList.add("is-shown");
          } else {
            target.type = "password";
            item.classList.remove("is-shown");
          }
        });

      });
    }
  }

  NioApp.Custom.autoChangeInput = function (selector) {
    let elem = document.querySelectorAll(selector);
    if (elem) {
      elem.forEach(item => {
        item.onkeyup = function(e) {
          var target = e.srcElement;
          var maxLength = parseInt(target.attributes["maxlength"].value, 10);
          var myLength = target.value.length;
          if (myLength >= maxLength) {
              var next = target;
              while (next = next.nextElementSibling) {
                  if (next == null)
                      break;
                  if (next.tagName.toLowerCase() == "input") {
                      next.focus();
                      break;
                  }
              }
          }
          if(e.key === "Backspace"){
            var previous = target;
            while (previous = previous.previousElementSibling) {
              if (previous == null)
                  break;
              if (previous.tagName.toLowerCase() == "input") {
                  previous.focus();
                  break;
              }
            }
          }
        }
      })
    }
  }

  NioApp.Custom.modeToggle = function (selector){
    let elm = document.querySelectorAll(selector);
    if (elm) {
      elm.forEach(item => {
        item.addEventListener('click', function(){
          document.body.classList.contains('is-dark') ? document.body.classList.remove('is-dark'): document.body.classList.add('is-dark');
          elm.forEach(item => {
            item.classList.contains('dark-active') ? item.classList.remove('dark-active'): item.classList.add('dark-active');
          })
        })
      })
    }
  }

  NioApp.Custom.progress = function(selector){
    let progressBar = document.querySelectorAll(selector);
    progressBar.forEach(item => {
      let amount = item.dataset.progress;
      item.style.width = amount;
    })
  }
  
  /* Addons init */
  NioApp.Addons.init = function () {
    NioApp.Addons.DatePicker('.js-datepicker');
    NioApp.Addons.Select('.js-select');
    NioApp.Addons.Tags('.js-tags');
    NioApp.Addons.Clipboard('.js-copy');
    NioApp.Addons.Editor('.js-editor');
    NioApp.Addons.Filter('.filter-container','.filter-item');
  }

  /* Custom Scripts init */
  NioApp.Custom.init = function () {
    NioApp.Sidebar.init();
    NioApp.Sidebar.dropdownInit();
    NioApp.Custom.priceToggle('.pricing-toggle-button');
    NioApp.Custom.showHidePassword('.password-toggle');
    NioApp.Custom.modeToggle('.mode-toggle');
    NioApp.Custom.progress('[data-progress]');
    NioApp.Custom.autoChangeInput('.input-auto-change');
    NioApp.CurrentLink(`.${menu.classes.link}`, menu.classes.item, menu.classes.sub, menu.classes.main,[menu.classes.active, menu.classes.current],true);
  }

  /* Bootstrap Scripts init  */
  NioApp.BS.init = function () {
    NioApp.BS.tooltip('[data-bs-toggle="tooltip"]');
    NioApp.BS.popover('[data-bs-toggle="popover"]');
    NioApp.BS.toast('[data-bs-toggle="toast"]');
    NioApp.BS.alert('[data-bs-toggle="alert"]');
    NioApp.BS.alert('.custom-alert-trigger',{
      target:"customAlertPlaceholder",
      variant:"warning",
      content:"Some aweosme alert text from JavaScript!",
    });
    NioApp.BS.validate('.form-validate');
  }

  // Initial by default
  /////////////////////////////
  NioApp.init = function () {
    NioApp.winLoad(NioApp.BS.init);
    NioApp.winLoad(NioApp.Custom.init);
    NioApp.winLoad(NioApp.Addons.init);
  }
  NioApp.init();

  return NioApp;
})(NioApp);
