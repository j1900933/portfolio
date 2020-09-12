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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dataUpdate.js":
/*!************************************!*\
  !*** ./resources/js/dataUpdate.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var id_data = $('.comment').data('id');
var result = $('.comment').map(function () {
  return $(this).data();
}).toArray();
console.log(result);
$('.comments').on('change', function () {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "engineers/indexUpdate",
    type: "post",
    dataType: "json",
    data: {
      'id': result,
      'comment': $(".comment").val() // `.comments` クラスを持っている要素に data-* 属性で id をもたせる

    }
  }).done(function (data) {
    console.log(data);
  }).fail(function (_data) {
    alert("ajax Error");
  });
  return false;
});
$('.employment').on('change', function () {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "engineers/indexUpdate",
    type: "post",
    dataType: "json",
    data: {
      'id': $(".id").val(),
      'employment_status_id': $(".employment").val()
    }
  }).done(function (data) {
    console.log(data);
  }).fail(function (_data) {
    alert("ajax Error");
  });
  return false;
});
$('.inHouseStatus').on('change', function () {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "engineers/indexUpdate",
    type: "post",
    dataType: "json",
    data: {
      'id': $(".id").val(),
      'in_house_status_id': $(".inHouseStatus").val()
    }
  }).done(function (data) {
    console.log(data);
  }).fail(function (_data) {
    alert("ajax Error");
  });
  return false;
});
$('.engineerSkill').on('change', function () {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "engineers/indexUpdate",
    type: "post",
    dataType: "json",
    data: {
      'id': $(".id").val(),
      'engineer_skill_id': $(".engineerSkill").val()
    }
  }).done(function (data) {
    console.log(data);
  }).fail(function (_data) {
    alert("ajax Error");
  });
  return false;
});
$('.humanSkill').on('change', function () {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "engineers/indexUpdate",
    type: "post",
    dataType: "json",
    data: {
      'id': $(".id").val(),
      'human_skill_id': $(".humanSkill").val()
    }
  }).done(function (data) {
    console.log(data);
  }).fail(function (_data) {
    alert("ajax Error");
  });
  return false;
});

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/dataUpdate.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/training_osajima/resources/js/dataUpdate.js */"./resources/js/dataUpdate.js");


/***/ })

/******/ });