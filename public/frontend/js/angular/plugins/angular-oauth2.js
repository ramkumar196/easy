!function(e,t){"function"==typeof define&&define.amd?define(["angular","angular-cookies","query-string"],t):"object"==typeof exports?module.exports=t(require("angular"),require("angular-cookies"),require("query-string")):e.angularOAuth2=t(e.angular,"ngCookies",e.queryString)}(this,function(e,t,n){function r(e){e.interceptors.push("oauthInterceptor")}function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function i(){var t=this,r=function(t){if(!(t instanceof Object))throw new TypeError("Invalid argument: `config` must be an `Object`.");var n=e.extend({},f,t);return e.forEach(h,function(e){if(!n[e])throw new Error("Missing parameter: "+e+".")}),"/"===n.baseUrl.substr(-1)&&(n.baseUrl=n.baseUrl.slice(0,-1)),"/"!==n.grantPath[0]&&(n.grantPath="/"+n.grantPath),"/"!==n.revokePath[0]&&(n.revokePath="/"+n.revokePath),n};this.configure=function(e){t.defaultConfig=r(e)},this.$get=function(t,i){var a=function(){function a(e){o(this,a),this.config=e}return s(a,[{key:"configure",value:function(e){this.config=r(e)}},{key:"isAuthenticated",value:function(){return!!i.getToken()}},{key:"getAccessToken",value:function(r,o){return r=e.extend({client_id:this.config.clientId,grant_type:"password"},r),null!==this.config.clientSecret&&(r.client_secret=this.config.clientSecret),r=n.stringify(r),o=e.extend({headers:{Authorization:void 0,"Content-Type":"application/x-www-form-urlencoded"}},o),t.post(""+this.config.baseUrl+this.config.grantPath,r,o).then(function(e){return i.setToken(e.data),e})}},{key:"getRefreshToken",value:function(r,o){return r=e.extend({client_id:this.config.clientId,grant_type:"refresh_token",refresh_token:i.getRefreshToken()},r),null!==this.config.clientSecret&&(r.client_secret=this.config.clientSecret),r=n.stringify(r),o=e.extend({headers:{Authorization:void 0,"Content-Type":"application/x-www-form-urlencoded"}},o),t.post(""+this.config.baseUrl+this.config.grantPath,r,o).then(function(e){return i.setToken(e.data),e})}},{key:"revokeToken",value:function(r,o){var a=i.getRefreshToken();return r=e.extend({client_id:this.config.clientId,token:a?a:i.getAccessToken(),token_type_hint:a?"refresh_token":"access_token"},r),null!==this.config.clientSecret&&(r.client_secret=this.config.clientSecret),r=n.stringify(r),o=e.extend({headers:{"Content-Type":"application/x-www-form-urlencoded"}},o),t.post(""+this.config.baseUrl+this.config.revokePath,r,o).then(function(e){return i.removeToken(),e})}}]),a}();return new a(this.defaultConfig)},this.$get.$inject=["$http","OAuthToken"]}function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function a(){var t={name:"token",options:{secure:!0}};this.configure=function(n){if(!(n instanceof Object))throw new TypeError("Invalid argument: `config` must be an `Object`.");return e.extend(t,n),t},this.$get=function(e){var n=function(){function n(){o(this,n)}return s(n,[{key:"setToken",value:function(n){return e.putObject(t.name,n,t.options)}},{key:"getToken",value:function(){return e.getObject(t.name)}},{key:"getAccessToken",value:function(){var e=this.getToken()||{},t=e.access_token;return t}},{key:"getAuthorizationHeader",value:function(){var e=this.getTokenType(),t=this.getAccessToken();if(e&&t)return e.charAt(0).toUpperCase()+e.substr(1)+" "+t}},{key:"getRefreshToken",value:function(){var e=this.getToken()||{},t=e.refresh_token;return t}},{key:"getTokenType",value:function(){var e=this.getToken()||{},t=e.token_type;return t}},{key:"removeToken",value:function(){return e.remove(t.name,t.options)}}]),n}();return new n},this.$get.$inject=["$cookies"]}function u(e,t,n){return{request:function(e){return e.headers=e.headers||{},!e.headers.hasOwnProperty("Authorization")&&n.getAuthorizationHeader()&&(e.headers.Authorization=n.getAuthorizationHeader()),e},responseError:function(r){return r?(400!==r.status||!r.data||"invalid_request"!==r.data.error&&"invalid_grant"!==r.data.error||(n.removeToken(),t.$emit("oauth:error",r)),(401===r.status&&r.data&&"invalid_token"===r.data.error||r.headers&&r.headers("www-authenticate")&&0===r.headers("www-authenticate").indexOf("Bearer"))&&t.$emit("oauth:error",r),e.reject(r)):e.reject(r)}}}var c=e.module("angular-oauth2",[t]).config(r).factory("oauthInterceptor",u).provider("OAuth",i).provider("OAuthToken",a);r.$inject=["$httpProvider"];var s=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),f={baseUrl:null,clientId:null,clientSecret:null,grantPath:"/oauth2/token",revokePath:"/oauth2/revoke"},h=["baseUrl","clientId","grantPath","revokePath"],s=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}();return u.$inject=["$q","$rootScope","OAuthToken"],c});