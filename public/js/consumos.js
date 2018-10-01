/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 3:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "productBus", function() { return productBus; });

var productBus = new Vue();

var app = new Vue({
    el: '#consumos',
    components: {
        'menu-component': __webpack_require__(42),
        'ticket-component': __webpack_require__(46)
    }
});

/***/ }),

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ }),

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(13)
/* script */
var __vue_script__ = __webpack_require__(43)
/* template */
var __vue_template__ = __webpack_require__(45)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/consumos/MenuComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-58a2149a", Component.options)
  } else {
    hotAPI.reload("data-v-58a2149a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 43:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__consumos_js__ = __webpack_require__(3);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

var debounce = __webpack_require__(44);


/* harmony default export */ __webpack_exports__["default"] = ({
	data: function data() {
		return {
			categoriaSeleccionada: {
				id: 0,
				obj: {}
			},
			categorias: [],
			busqueda: "",
			menu: {}
		};
	},
	created: function created() {
		this.getProductos = debounce(this.getProductos, 300);
	},
	mounted: function mounted() {
		var _this = this;

		axios.get('consumos/categorias').then(function (response) {
			_this.categorias = response.data;
		});

		this.categoriaSeleccionada.id = 1;
	},

	methods: {
		getProductos: function getProductos() {
			var _this2 = this;

			if (this.categoriaSeleccionada.id in this.menu) {
				this.categoriaSeleccionada.obj = this.menu[this.categoriaSeleccionada.id];
			} else {
				var parameter = this.categoriaSeleccionada.id > 0 ? this.categoriaSeleccionada.id : this.busqueda;
				axios.get('consumos/productos/' + parameter).then(function (response) {
					_this2.categoriaSeleccionada.obj = response.data;
					// solo guardo en caché cuando cat > 0 y la categoria aun no esté en el menu
					if (_this2.categoriaSeleccionada.id > 0 && !(_this2.categoriaSeleccionada.id in _this2.menu)) _this2.menu[_this2.categoriaSeleccionada['id']] = response.data;
				});
			}
		},
		productoSeleccionado: function productoSeleccionado(producto) {
			__WEBPACK_IMPORTED_MODULE_0__consumos_js__["productBus"].$emit('productoSeleccionado', producto);
		}
	},
	watch: {
		'categoriaSeleccionada.id': function categoriaSeleccionadaId() {
			this.getProductos();
		},
		'busqueda': function busqueda(newVal, oldVal) {
			/*
    * Este método muta el valor del id de la categoria; el valor original es pasado a
    * un numero negativo cuando se llena el campo de busqueda y devuelto a positivo
    * cuando se borre. A la magnitud original en negativo se le va restando el numero
    * de caracteres de la busqueda mientras vaya en aumento y sumando cuando va decrementando
    * a cuentas de que al final regrese al valor original.
    */

			var deltaVal = oldVal.length - newVal.length;
			var in_limits = oldVal.length == 0 || newVal.length == 0;
			if (in_limits) {
				this.categoriaSeleccionada.id = oldVal.length == 0 ? -this.categoriaSeleccionada.id + deltaVal : -(this.categoriaSeleccionada.id + deltaVal);
			} else {
				this.categoriaSeleccionada.id += deltaVal;
			}
		}
	}
});

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

/**
 * Returns a function, that, as long as it continues to be invoked, will not
 * be triggered. The function will be called after it stops being called for
 * N milliseconds. If `immediate` is passed, trigger the function on the
 * leading edge, instead of the trailing. The function also has a property 'clear' 
 * that is a function which will clear the timer to prevent previously scheduled executions. 
 *
 * @source underscore.js
 * @see http://unscriptable.com/2009/03/20/debouncing-javascript-methods/
 * @param {Function} function to wrap
 * @param {Number} timeout in ms (`100`)
 * @param {Boolean} whether to execute at the beginning (`false`)
 * @api public
 */
function debounce(func, wait, immediate){
  var timeout, args, context, timestamp, result;
  if (null == wait) wait = 100;

  function later() {
    var last = Date.now() - timestamp;

    if (last < wait && last >= 0) {
      timeout = setTimeout(later, wait - last);
    } else {
      timeout = null;
      if (!immediate) {
        result = func.apply(context, args);
        context = args = null;
      }
    }
  };

  var debounced = function(){
    context = this;
    args = arguments;
    timestamp = Date.now();
    var callNow = immediate && !timeout;
    if (!timeout) timeout = setTimeout(later, wait);
    if (callNow) {
      result = func.apply(context, args);
      context = args = null;
    }

    return result;
  };

  debounced.clear = function() {
    if (timeout) {
      clearTimeout(timeout);
      timeout = null;
    }
  };
  
  debounced.flush = function() {
    if (timeout) {
      result = func.apply(context, args);
      context = args = null;
      
      clearTimeout(timeout);
      timeout = null;
    }
  };

  return debounced;
};

// Adds compatibility for ES modules
debounce.debounce = debounce;

module.exports = debounce;


/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "col-sm-8" }, [
    _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-header" }, [
        _c("h5", [_vm._v("Menú")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "nav nav-pills", attrs: { role: "tablist" } },
          [
            _vm._l(_vm.categorias, function(categoria) {
              return _c("div", { key: categoria.id, staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    class: [
                      categoria.id == _vm.categoriaSeleccionada.id
                        ? "active"
                        : "",
                      "nav-link",
                      "text-capitalize"
                    ],
                    attrs: { href: "javascript:void(0)" },
                    on: {
                      click: function($event) {
                        _vm.categoriaSeleccionada.id = categoria.id
                      }
                    }
                  },
                  [
                    _vm._v(
                      "\n\n\t\t\t\t\t\t" +
                        _vm._s(categoria.descripcion) +
                        "\n\n\t\t\t\t\t"
                    )
                  ]
                )
              ])
            }),
            _vm._v(" "),
            _c("form", { staticClass: "form-inline" }, [
              _c("i", {
                staticClass: "fas fa-search",
                attrs: { "aria-hidden": "true" }
              }),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.busqueda,
                    expression: "busqueda"
                  }
                ],
                staticClass: "form-control ml-3 mw-100",
                attrs: {
                  type: "text",
                  placeholder: "Buscar Producto",
                  "aria-label": "search"
                },
                domProps: { value: _vm.busqueda },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.busqueda = $event.target.value
                  }
                }
              })
            ])
          ],
          2
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "card-body" },
        _vm._l(_vm.categoriaSeleccionada["obj"], function(items, index) {
          return _c("div", { key: index, staticClass: "container" }, [
            _c("div", { staticClass: "row font-weight-bold" }, [
              _c("h5", [
                _c("i", { staticClass: "fas fa-angle-right" }, [
                  _vm._v(" " + _vm._s(index) + " ")
                ])
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "row" },
              _vm._l(items, function(producto) {
                return _c(
                  "div",
                  { key: producto.id, staticClass: "col-md-3" },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "product-card card mb-3",
                        attrs: { id: "product-" + producto.id }
                      },
                      [
                        _c(
                          "a",
                          {
                            staticClass: "simple-link",
                            attrs: { href: "javascript:void(0)" },
                            on: {
                              click: function($event) {
                                _vm.productoSeleccionado(producto)
                              }
                            }
                          },
                          [
                            _c("img", {
                              staticClass: "card-img-top",
                              attrs: { src: producto.nombre_imagen }
                            }),
                            _vm._v(" "),
                            _vm._m(0, true),
                            _vm._v(" "),
                            _c(
                              "h6",
                              {
                                staticClass:
                                  "card-title text-center text-capitalize"
                              },
                              [
                                _c("b", [
                                  _vm._v(" " + _vm._s(producto.nombre) + " ")
                                ])
                              ]
                            )
                          ]
                        )
                      ]
                    )
                  ]
                )
              })
            )
          ])
        })
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-img-overlay bg-dark text-white text-center align-middle"
      },
      [_c("i", { staticClass: "fas fa-plus-circle fa-3x" })]
    )
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-58a2149a", module.exports)
  }
}

/***/ }),

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(13)
/* script */
var __vue_script__ = __webpack_require__(47)
/* template */
var __vue_template__ = __webpack_require__(48)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/consumos/TicketComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1af405e6", Component.options)
  } else {
    hotAPI.reload("data-v-1af405e6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 47:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__consumos_js__ = __webpack_require__(3);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            productoActual: {
                id: 0,
                nombre: "",
                precios: {},
                cantidad: 0,
                precioSeleccionado: 0
            },
            listaProductos: [],
            $modalAdd: {}
        };
    },
    created: function created() {
        var _this = this;

        __WEBPACK_IMPORTED_MODULE_0__consumos_js__["productBus"].$on('productoSeleccionado', function (producto) {
            _this.productoActual.id = producto.id;
            _this.productoActual.nombre = producto.nombre;
        });
    },
    mounted: function mounted() {
        this.$modalAdd = $("#nuevoProducto");
        this.$modalAdd.modal({ show: false });
        this.$modalAdd.on('hidden.bs.modal', this.modalAddHidden);
    },

    methods: {
        modalAddHidden: function modalAddHidden() {
            this.productoActual.id = 0;
        },
        addProducto: function addProducto() {
            var _this2 = this;

            var precioActual = this.productoActual.precios[this.productoActual.precioSeleccionado];

            var ids = this.listaProductos.map(function (item) {
                return item.id;
            });
            var id = -1;

            if (precioActual.modo_servicio_id === 1) //Fué por kilogramo
                {

                    var precio_found = -1;
                    var modo_servicio_found = -1;
                    var precios_por_kg = {};

                    //Todos los modos de servicio que tiene el producto
                    Object.keys(this.productoActual.precios).forEach(function (key) {
                        key = parseInt(key);
                        if (_this2.productoActual.precios[key].modo_servicio_id == 1 /*1 kg*/ || _this2.productoActual.precios[key].modo_servicio_id == 2 /*1/2 kg*/ || _this2.productoActual.precios[key].modo_servicio_id == 3) /*1/4 kg*/
                            {
                                precios_por_kg[_this2.productoActual.precios[key].modo_servicio_id] = { "id": key, "precio": _this2.productoActual.precios[key].precio };

                                if (ids.indexOf(key) >= 0) {
                                    precio_found = ids.indexOf(key);
                                }
                            }
                    });

                    if (precio_found >= 0) {

                        this.listaProductos[precio_found].cantidad += this.productoActual.cantidad;
                        if (this.listaProductos[precio_found].cantidad > 0.5) {
                            this.listaProductos[precio_found].id = precioActual.id;
                            this.listaProductos[precio_found].precio = precioActual.precio;
                            this.listaProductos[precio_found].modo_servicio_id = 1;
                        }
                        if (this.listaProductos[precio_found].cantidad > 0.25 && this.listaProductos[precio_found].cantidad <= 0.5) {
                            this.listaProductos[precio_found].id = precios_por_kg[2].id;
                            this.listaProductos[precio_found].precio = precios_por_kg[2].precio;
                            this.listaProductos[precio_found].modo_servicio_id = 2;
                        }
                        if (this.listaProductos[precio_found].cantidad <= 0.25) {
                            this.listaProductos[precio_found].id = precios_por_kg[3].id;
                            this.listaProductos[precio_found].precio = precios_por_kg[3].precio;
                            this.listaProductos[precio_found].modo_servicio_id = 3;
                        }
                    } else {
                        if (this.productoActual.cantidad >= 0.5 && this.productoActual.cantidad < 1.0) {
                            precioActual.id = precios_por_kg[2].id;
                            precioActual.precio = precios_por_kg[2].precio;
                            precioActual.modo_servicio_id = 2;
                        }
                        if (this.productoActual.cantidad < 0.5) {
                            precioActual.id = precios_por_kg[3].id;
                            precioActual.precio = precios_por_kg[3].precio;
                            precioActual.modo_servicio_id = 3;
                        }

                        this.listaProductos.push({
                            "id": precioActual.id,
                            "nombre": this.productoActual.nombre,
                            "cantidad": this.productoActual.cantidad,
                            "modo_servicio_id": precioActual.modo_servicio_id,
                            "modo_servicio": precioActual.modo_servicio,
                            "precio": precioActual.precio,
                            "selected": false
                        });
                    }
                } else {
                if ((id = ids.indexOf(precioActual.id)) >= 0) {
                    this.listaProductos[id].cantidad += this.productoActual.cantidad;
                } else {
                    this.listaProductos.push({
                        "id": precioActual.id,
                        "nombre": this.productoActual.nombre,
                        "cantidad": this.productoActual.cantidad,
                        "modo_servicio_id": precioActual.modo_servicio_id,
                        "modo_servicio": precioActual.modo_servicio,
                        "precio": precioActual.precio,
                        "selected": false
                    });
                }
            }
            this.selection(this.listaProductos.length - 1);

            this.$modalAdd.modal('hide');
        },
        precioProducto: function precioProducto(prodId) {
            var ids = this.listaProductos.map(function (item) {
                return item.id;
            });
            var id = ids.indexOf(prodId);
            if (id >= 0) {
                var divisor = 1.0;
                if ([2, 3].includes(this.listaProductos[id].modo_servicio_id)) {
                    switch (this.listaProductos[id].modo_servicio_id) {
                        case 2:
                            divisor = 0.50;
                            break;
                        case 3:
                            divisor = 0.25;
                            break;
                    }
                }
                return (parseFloat(this.listaProductos[id].precio) * parseFloat(this.listaProductos[id].cantidad / divisor)).toFixed(2);
            }
            return 0.00;
        },
        validaCantidad: function validaCantidad(evt) {
            var cantidadAceptaFloat = this.productoActual.precioSeleccionado > 0 ? this.productoActual.precios[this.productoActual.precioSeleccionado].modo_servicio_id === 1 : false;
            evt = evt ? evt : window.event;
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (!cantidadAceptaFloat && charCode == 46) {
                evt.preventDefault();
            } else {
                return true;
            }
        },
        getDescripcion: function getDescripcion(productoAgregado) {
            var retVal = "";
            if ([1, 2, 3].includes(productoAgregado.modo_servicio_id)) {
                retVal += (productoAgregado.cantidad < 1.0 ? (productoAgregado.cantidad * 1000).toString() + " g." : productoAgregado.cantidad + "Kg.") + " - a $" + parseFloat(productoAgregado.precio).toFixed(2) + " ";
                switch (productoAgregado.modo_servicio_id) {
                    case 1:
                        retVal += "el kilo.";
                        break;
                    case 2:
                        retVal += "el medio.";
                        break;
                    case 3:
                        retVal += "el cuarto.";
                        break;
                }
            } else {
                retVal += productoAgregado.cantidad + " ";
                switch (productoAgregado.modo_servicio_id) {
                    case 5:
                        //Orden
                        retVal += productoAgregado.modo_servicio + (productoAgregado.cantidad > 1 ? "es" : "");
                        break;
                    case 9:
                        //Litro
                        retVal += productoAgregado.cantidad > 1 ? "Litros" : "Litro";
                        break;
                    case 10:
                        //Jarra
                        retVal += productoAgregado.cantidad > 1 ? "Jarras" : "Jarra";
                        break;
                    default:
                        retVal += productoAgregado.modo_servicio + (productoAgregado.cantidad > 1 ? "s" : "");
                        break;
                }
                retVal += " - a $" + parseFloat(productoAgregado.precio).toFixed(2) + " c/u.";
            }
            return retVal;
        },
        selection: function selection(idProd) {
            if (this.listaProductos[idProd].selected) {
                this.listaProductos[idProd].selected = false;
            } else {
                this.listaProductos.forEach(function (item) {
                    item.selected = false;
                });
                this.listaProductos[idProd].selected = true;
            }
        }
    },
    watch: {
        'productoActual.id': function productoActualId(newVal, oldVal) {
            var _this3 = this;

            if (oldVal == 0) {
                //
                axios.get('consumos/precios/' + this.productoActual.id).then(function (response) {
                    _this3.productoActual.precios = response.data;
                });
            }
            if (newVal == 0) {
                this.productoActual.nombre = "";
                this.productoActual.precios = {};
                this.productoActual.cantidad = 0;
                this.productoActual.precioSeleccionado = 0;
            }
        },
        'productoActual.precios': function productoActualPrecios(newVal, oldVal) {
            // Revisa que el nuevo objeto 'precios' no esté vacío
            if (Object.keys(newVal).length > 0) this.$modalAdd.modal('show');
        },
        'productoActual.precioSeleccionado': function productoActualPrecioSeleccionado(newVal, oldVal) {
            if (newVal > 0 && this.productoActual.precios[newVal].modo_servicio_id == 1) {
                this.productoActual.cantidad = parseFloat(this.productoActual.cantidad).toFixed(1);
            } else {
                this.productoActual.cantidad = parseInt(this.productoActual.cantidad);
            }
        }
    },
    computed: {
        disableSubmit: function disableSubmit() {
            //Valida el form del modal que agrega nuevo producto a la lista
            return this.mostrarSelect && this.productoActual.precioSeleccionado <= 0 || this.productoActual.cantidad == "" || this.productoActual.cantidad <= 0;
        },
        mostrarSelect: function mostrarSelect() {
            var idPrecios = Object.keys(this.productoActual.precios);
            if (idPrecios.length > 1) {
                var idModServ = [];
                for (var index in this.productoActual.precios) {
                    idModServ.push(this.productoActual.precios[index].modo_servicio_id);
                }
                //Devuelve true a menos que los 3 productos que hayan sean id 2 y 3
                return !(idPrecios.length === 3 && (idModServ.includes(2) || idModServ.includes(3)));
            } else return false;
        },
        presentacionDefault: function presentacionDefault() {
            var retVal = "";
            if (Object.keys(this.productoActual.precios).length > 0) {
                retVal = this.productoActual.precios[Object.keys(this.productoActual.precios)[0]].modo_servicio;
                this.productoActual.precioSeleccionado = parseInt(Object.keys(this.productoActual.precios)[0]);
            }
            return retVal;
        },
        cantidadStep: function cantidadStep() {
            var cantidadAceptaFloat = this.productoActual.precioSeleccionado > 0 ? this.productoActual.precios[this.productoActual.precioSeleccionado].modo_servicio_id === 1 : false;
            return cantidadAceptaFloat ? "0.1" : "1";
        },
        total: function total() {
            var $this = this;
            if (this.listaProductos.length > 0) return this.listaProductos.map(function (prod) {
                return parseFloat($this.precioProducto(prod.id));
            }).reduce(function (acumulado, actual) {
                return acumulado + actual;
            }).toFixed(2);else return 0.0.toFixed(2);
        },
        isProdSelected: function isProdSelected() {
            return this.listaProductos.length > 0 && this.listaProductos.find(function (element) {
                return element.selected;
            }) != null;
        }
    }
});

/***/ }),

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "col-sm-4" }, [
    _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-header" }, [
        _c("h5", [_vm._v("Productos")]),
        _vm._v(" "),
        _c("button", { class: _vm.isProdSelected ? "visible" : "invisible" }, [
          _c("i", { staticClass: "fas fa-trash-alt" })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "card-body p-0" }, [
        _c(
          "ul",
          {
            staticClass: "list-group list-group-flush",
            attrs: { id: "products-list" }
          },
          [
            _vm._l(_vm.listaProductos, function(producto, index) {
              return _c(
                "li",
                {
                  key: producto.id,
                  class: ["list-group-item", producto.selected ? "active" : ""],
                  on: {
                    click: function($event) {
                      _vm.selection(index)
                    }
                  }
                },
                [
                  _c("div", { staticClass: "container" }, [
                    _c("div", { staticClass: "row product-header" }, [
                      _c("div", { staticClass: "col-sm-9 p-0 text-truncate" }, [
                        _vm._v(
                          "\n                                " +
                            _vm._s(producto.nombre) +
                            "\n                            "
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-sm-3 p-0 text-right" }, [
                        _vm._v(
                          "\n                                $" +
                            _vm._s(_vm.precioProducto(producto.id)) +
                            "\n                            "
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "row product-detail font-italic" },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(_vm.getDescripcion(producto)) +
                            "\n                        "
                        )
                      ]
                    )
                  ])
                ]
              )
            }),
            _vm._v(" "),
            _c("li", { staticClass: "list-group-item" }, [
              _c("div", { staticClass: "container" }, [
                _c("div", { staticClass: "row product-header text-right" }, [
                  _c("div", { staticClass: "col-sm-9 p-0 text-truncate" }, [
                    _vm._v(
                      "\n                                Total\n                            "
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-sm-3 p-0 text-right" }, [
                    _vm._v(
                      "\n                                $" +
                        _vm._s(_vm.total) +
                        " "
                    )
                  ])
                ])
              ])
            ])
          ],
          2
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: { id: "nuevoProducto", tabindex: "-1", role: "dialog" }
      },
      [
        _c(
          "div",
          { staticClass: "modal-dialog", attrs: { role: "document" } },
          [
            _c("div", { staticClass: "modal-content" }, [
              _c("div", { staticClass: "modal-header" }, [
                _c("h5", { staticClass: "modal-title" }, [
                  _vm._v(
                    "Agregar " +
                      _vm._s(_vm.productoActual.nombre) +
                      "\n                "
                  )
                ]),
                _vm._v(" "),
                _vm._m(0)
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body" }, [
                _c("form", { staticClass: "form" }, [
                  _c("div", { staticClass: "form-row" }, [
                    _c("div", { staticClass: "form-group col-md-4" }, [
                      _c("label", [_vm._v("Presentacion:")]),
                      _vm._v(" "),
                      _vm.mostrarSelect
                        ? _c(
                            "select",
                            {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model.number",
                                  value: _vm.productoActual.precioSeleccionado,
                                  expression:
                                    "productoActual.precioSeleccionado",
                                  modifiers: { number: true }
                                }
                              ],
                              staticClass: "form-control",
                              on: {
                                change: function($event) {
                                  var $$selectedVal = Array.prototype.filter
                                    .call($event.target.options, function(o) {
                                      return o.selected
                                    })
                                    .map(function(o) {
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return _vm._n(val)
                                    })
                                  _vm.$set(
                                    _vm.productoActual,
                                    "precioSeleccionado",
                                    $event.target.multiple
                                      ? $$selectedVal
                                      : $$selectedVal[0]
                                  )
                                }
                              }
                            },
                            [
                              _c("option", { domProps: { value: 0 } }, [
                                _vm._v("Seleccione una opcion")
                              ]),
                              _vm._v(" "),
                              _vm._l(_vm.productoActual.precios, function(
                                precio
                              ) {
                                return ![2, 3].includes(precio.modo_servicio_id)
                                  ? _c(
                                      "option",
                                      {
                                        key: precio.id,
                                        domProps: { value: precio.id }
                                      },
                                      [
                                        _vm._v(
                                          "\n                                    " +
                                            _vm._s(precio.modo_servicio) +
                                            "\n                                "
                                        )
                                      ]
                                    )
                                  : _vm._e()
                              })
                            ],
                            2
                          )
                        : _c("b", [_vm._v(_vm._s(_vm.presentacionDefault))])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "form-group col-md-6" }, [
                      _c("label", [_vm._v("Cantidad:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.number",
                            value: _vm.productoActual.cantidad,
                            expression: "productoActual.cantidad",
                            modifiers: { number: true }
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "number",
                          min: "0",
                          step: _vm.cantidadStep
                        },
                        domProps: { value: _vm.productoActual.cantidad },
                        on: {
                          keypress: _vm.validaCantidad,
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.productoActual,
                              "cantidad",
                              _vm._n($event.target.value)
                            )
                          },
                          blur: function($event) {
                            _vm.$forceUpdate()
                          }
                        }
                      })
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-footer" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-secondary",
                    attrs: { type: "button", "data-dismiss": "modal" }
                  },
                  [_vm._v("Cancelar")]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-primary",
                    attrs: { type: "button", disabled: _vm.disableSubmit },
                    on: { click: _vm.addProducto }
                  },
                  [_vm._v("Aceptar")]
                )
              ])
            ])
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close"
        }
      },
      [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
    )
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1af405e6", module.exports)
  }
}

/***/ })

/******/ });