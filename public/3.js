(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{4:function(t,e,a){"use strict";var o={name:"adminNav"},i=a(0),c=Object(i.a)(o,(function(){var t=this.$createElement,e=this._self._c||t;return e("nav",{staticClass:"bg-darkviolet"},[e("ul",{staticClass:" flex flex-col md:flex-row"},[e("li",{staticClass:"flex-1 mr-2"},[e("a",{staticClass:"text-center block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white hover:text-lightblue"},[e("router-link",{attrs:{to:{name:"dashboardInicio"}}},[this._v("Inicio")])],1)]),this._v(" "),e("li",{staticClass:"flex-1 mr-2"},[e("a",{staticClass:"text-center block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white hover:text-lightblue"},[e("router-link",{attrs:{to:{name:"dashboardUsuarios"}}},[this._v("Usuarios")])],1)]),this._v(" "),e("li",{staticClass:"flex-1 mr-2"},[e("a",{staticClass:"text-center block hover:text-lightblue text-white hover:bg-gray-200 py-2 px-4",attrs:{href:"#"}},[e("router-link",{attrs:{to:{name:"dashboardContactos"}}},[this._v("Contactos")])],1)]),this._v(" "),e("li",{staticClass:"text-center flex-1"},[e("a",{staticClass:"block py-2 px-4 text-white hover:text-lightblue",attrs:{href:"#"}},[e("router-link",{attrs:{to:{name:"logout"}}},[this._v("Cerrar Sesión")])],1)])])])}),[],!1,null,"2a5a4262",null);e.a=c.exports},87:function(t,e,a){"use strict";a.r(e);var o=a(4),i={name:"detalleContacto",data:function(){return{id:"",contacto:[],comercio:[],categorias:[],iniciacion:"",verificacion_comercio:""}},methods:{obtenerDetalleContacto:function(){var t=this;this.id=this.$route.params.id,axios.get("http://localhost:8000/api/contactos/".concat(this.id)).then((function(e){console.log(e.data),t.contacto=e.data.contacto,1==e.data.contacto.iniciacion_realizada?(console.log("Con iniciacion"),t.iniciacion=!0):(console.log("Sin"),t.iniciacion=!1);for(var a=0;a<e.data.categorias.length;a++)t.categorias.push(e.data.categorias[a]);console.log(t.categorias),e.data.comercio.length>0?(t.comercio=e.data.comercio[0],t.verificacion_comercio=!0):t.verificacion_comercio=!1})).catch((function(t){console.log(t)}))}},mounted:function(){this.obtenerDetalleContacto()}},c=a(0),s=Object(c.a)(i,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"mx-auto bg-gray-700 h-full py-4 flex items-center justify-center px-8"},[a("div",{staticClass:"flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-2/3 lg:w-4/5"},[t._m(0),t._v(" "),a("div",{staticClass:"flex flex-col w-full md:flex-row"},[1==t.iniciacion?a("div",{staticClass:"flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-green rounded md:flex-col md:items-center md:justify-center md:w-1/4"},[a("p",{staticClass:"md:text-xl"},[t._v("Iniciacion realizada")])]):a("div",{staticClass:"flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-red rounded md:flex-col md:items-center md:justify-center md:w-1/4"},[a("p",{staticClass:"md:text-xl"},[t._v("Sin iniciación")])]),t._v(" "),a("div",{staticClass:"p-4 font-normal text-gray-800 md:w-3/4"},[a("h2",{staticClass:"mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800"},[t._v(t._s(t.contacto.nombre_completo))]),t._v(" "),a("p",{staticClass:"leading-normal"},[t._v("Teléfono de contacto: "+t._s(t.contacto.telefono))]),t._v(" "),a("p",{staticClass:"leading-normal"},[t._v("Correo electrónico: "+t._s(t.contacto.email))]),t._v(" "),a("p",{staticClass:"leading-normal"},[t._v("Nombre comercio: "+t._s(t.contacto.nombre_fantasia_comercio))]),t._v(" "),a("br"),t._v(" "),a("h3",{staticClass:"font-bold"},[t._v("Datos comercio")]),t._v(" "),1==t.verificacion_comercio?a("div",[a("p",{staticClass:"leading-normal"},[t._v("Rut Comercio: "+t._s(t.comercio.rut))]),t._v(" "),a("p",{staticClass:"leading-normal"},[t._v("Razón Social: "+t._s(t.comercio.razon_social))]),t._v(" "),a("p",{staticClass:"leading-normal"},[t._v("Cargo contacto: "+t._s(t.comercio.cargo))])]):a("div",[a("p",[t._v("Contacto no registra datos de comercio formales")])]),t._v(" "),a("br"),t._v(" "),a("h3",{staticClass:"font-bold"},[t._v("Categorias")]),t._v(" "),a("div",{staticClass:"flex flex-row items-center text-gray-700"},t._l(t.categorias,(function(e){return a("ul",[a("li",{staticClass:"text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default"},[t._v(t._s(e.descripcion))])])})),0),t._v(" "),a("div",{staticClass:"flex flex-row items-center mt-4 text-gray-700"})])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"w-full h-30 object-cover object-center bg-lightshadeblue text-center py-6 font-bold uppercase"},[e("h2",{staticClass:"text-2xl"},[this._v("Ficha contacto")])])}],!1,null,"75a8363e",null).exports,l={name:"DetalleContacto",components:{AdminNav:o.a,detalleContacto:s}},n=Object(c.a)(l,(function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("Navigation"),this._v(" "),e("AdminNav"),this._v(" "),e("detalle-contacto")],1)}),[],!1,null,"06c50dc9",null);e.default=n.exports}}]);