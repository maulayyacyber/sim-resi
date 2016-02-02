// add by dedi
function getDecimalSeparator()
{
	// utk cari tau decimal separator komputer browser
	var f = parseFloat(1/4); 
	var n = new Number(f);
	var r = new RegExp(',');
	
	if (r.test(n.toLocaleString())) return ',';
	else return '.';
	
}

function float2FormatMoney(f)
{
	// untuk convert float value (float ato string) menjadi format money standar
	// return nya string ex : 1.000.000,1234
	//                         |   |   |
	//                        (titik)(koma)
	var sf = new String(f);
  var n = new Number(parseFloat(sf));
	n = isNaN(n) ? 0 : n;

  var r = n.toLocaleString();

  if (getDecimalSeparator()=='.')
	{
		r = r.replace(/\./g, '#');
		r = r.replace(/,/g, '.');
		r = r.replace(/#/g, ',');
	}

	var myreg = /([-][0-9\.]*)(,?[0-9]{0,4})/;
	if (myreg.test(r)) { r = RegExp.$1 + RegExp.$2; }
	
  return r;
}

function float2FormatMoney2(f)
{
	// untuk convert float value (float ato string) menjadi format money standar
	// return nya string ex : 1.000.000,1234
	//                         |   |   |
	//                        (titik)(koma)
	var sf = new String(f);
  var n = new Number(parseFloat(sf));
	n = isNaN(n) ? 0 : n;

  var r = n.toLocaleString();

  /*if (getDecimalSeparator()=='.')
	{
		r = r.replace(/\./g, '#');
		r = r.replace(/,/g, '.');
		r = r.replace(/#/g, ',');
	}*/

	var myreg = /([-][0-9\.]*)(,?[0-9]{0,4})/;
	if (myreg.test(r)) { r = RegExp.$1 + RegExp.$2; }
	
  return r;
}

function float2FormatMoney_Multi(obj)
{
	// nah kalo ini utk convert value suatu object (satu ato banyak)
	// secara otomatis valuenya diganti menjadi format money standar
	if (obj && obj.name) obj.value = float2FormatMoney(obj.value);
	else if (obj) for (var i=0; i<obj.length; i++)
	{
		obj[i].value = float2FormatMoney(obj[i].value);
	}
  return true;
}


function entryFormatMoneyFloat(obj)
{
	// fungsi ini dipakai utk onkeyup pada object input
	// value object input secara otomatis di ubah menjadi format money standar
  if (obj.value == '-') return;
	
	var val = restoreMoneyValueFloat(obj);
	
	var myreg		= /\.([0-9]*)$/;
	var adakoma = myreg.test(val);
	var lastkoma= adakoma ? (RegExp.$1=='') : false;
	
	myreg = /\.(0+)$/;
	var lastnol = adakoma && myreg.test(val);
	
	myreg = /(0+)$/;
	var tailnol = adakoma && myreg.test(val);
	var adanol	 = tailnol ? RegExp.$1 : '';
	
	var n   = parseFloat(val);	
	
	n = isNaN(n) ? 0 : n;
	//if (entryFormatMoney.arguments[1] && n > entryFormatMoney.arguments[1]) n = entryFormatMoney.arguments[1];
	var n = new Number(n);
	var r = n.toLocaleString();
	
	if (getDecimalSeparator()=='.')
	{
		r = r.replace(/\./g, '#');
		r = r.replace(/,/g, '.');
		r = r.replace(/#/g, ',');
	}
	
	myreg = /([0-9\.]*)(,?[0-9]{0,4})/;
	if (myreg.test(r)) { r = RegExp.$1 + RegExp.$2; }
	
	obj.value = r + (lastkoma || lastnol ? ',' : '') + (tailnol ? adanol : '');
} 

function restoreMoneyValueFloat(obj)
{
	// fungsi ini utk mengembalikan string dari format money standar ke nilai float
	// nilai float dengan saparator decimal titik biar php/javascript bisa parsing
	
	var r = obj.value.replace(/\./g, '');
	r = r.replace(/,/, '#');
	r = r.replace(/,/g, '');
	r = r.replace(/#/, '.');
	return r;
}

function restoreMoneyValueFloatFromStr(str)
{
	// fungsi ini utk mengembalikan string dari format money standar ke nilai float
	// nilai float dengan saparator decimal titik biar php/javascript bisa parsing
	var rr = new String(str);
	var r = rr.replace(/ /g, '');
	r = r.replace(/\./g, '');
	r = r.replace(/,/, '#');
	r = r.replace(/,/g, '');
	r = r.replace(/#/, '.');
	return r;
}


function restoreMoneyValueFloat_Multi(obj)
{
	// fungsi ini utk mengembalikan string value dari suatu object (satu/banyak)
	// value object secara otomatis dikonvert menjadi nilai float
	
	if (obj && obj.name) obj.value = restoreMoneyValueFloat(obj);
	else if (obj) for (var i=0; i<obj.length; i++)
	{
		obj[i].value = restoreMoneyValueFloat(obj[i]);
	}
  return true;
}
// end by dedi


// *****add by : Uq 
function entryFormatMoney(obj)
{
  if (obj.value == '-') return;
	var val = obj.value.replace(/[\.,]/g, '');
	var n   = parseFloat(val);
	n = isNaN(n) ? 0 : n;
	if (entryFormatMoney.arguments[1] && n > entryFormatMoney.arguments[1]) n = entryFormatMoney.arguments[1];
	var n = new Number(n);
	obj.value = n.toLocaleString();
	obj.value = obj.value.replace(/[\.,]00$/, '');
}

function restoreMoneyValue(obj)
{
	return obj.value.replace(/[\.,]/g, '');
}
// ***** End add by : Uq 

// add by dedi
function entryFormatMoney2(obj)
{
	if (obj && obj.name) entryFormatMoney(obj);
	else if (obj) for (var i=0; i<obj.length; i++)
	{
		entryFormatMoney(obj[i]);
	}
  return true;
}

function restoreMoneyValue2(obj)
{
	if (obj && obj.name) obj.value = restoreMoneyValue(obj);
	else if (obj) for (var i=0; i<obj.length; i++)
	{
		obj[i].value = restoreMoneyValue(obj[i]);
	}
  return true;
}

function GetObjectByName(ObjName){
	var obj ;
	
	try{
		obj = MWJ_findObj(ObjName);
		}
	catch(e){
		obj = null ;
		}
	return obj ;

	}

function checkBlankText(s)
{
	if (s && (s.value == ''))
	{
		s.focus();
		s.style.backgroundColor = "wheat";
		alert('Please fill with data first');
		return false;
	}
	if (s)
		s.style.backgroundColor = "";
	return true;
}


//kalau ....
/*
function checkBlank_Prefix(prefix, start, end){
	var i=start;
	var result=true ;
	
	while (result && i <= end){
				
			obj = GetObjByName(prefix + i) ;
			if (obj==null){
				}
			else {
				result = result &&  checkBlankText(obj) ;
			}
			i ++ ;
		}// end while
	alert (result);
	return result ;
	}// end function
*/

//fungsi untuk mengecek apakah object yang diawali dengan nama z ada yg blank !!
function checkBlank_Prefix(z, start, end)
{
	var i;
	var obj;
	for (i=start ;i<=end;i++) {
	
		obj = GetObjectByName(z+i) ;
		
		if (obj!=null){
			if (!checkBlankText(document.all(z + i),0) ) return false;
			}//end if
			
	} // end for
		
	return true;
}


function checkNumber_Prefix(z, start, end)
{
	var i;
	var obj;
	for (i=start ;i<=end;i++) {
	
		obj = GetObjectByName(z+i) ;
		
		if (obj!=null){
			if (!checkNumber(document.all(z + i),0) ) return false;
			}//end if
			
	} // end for
		
	return true;
}

/*
PERRIND. 28Aug2003
memanggil fungsi CheckBlank_Prefix, tapi untuk berbagai macam nama object
yang diawali oleh prefix-prefix pada array arr[].
*/
/*
function checkBlank_Prefix_All( arr, start, end) {
	var idField ;
	
	for ( j=0; j<=arr.size; j++) {
		if ( !checkBlank_Prefix(arr[idField], start, end) ) return false ;
		}
	
	return true ;

}
*/

function checkBlank(z1,z2,z3,z4,z5,z6,z7,z8,z9,z10,z11,z12,z13,z14,z15,z16,z17,z18)
{
	var i;
	if (!checkBlankText(z1)) return false;
	if (!checkBlankText(z2)) return false;
	if (!checkBlankText(z3)) return false;
	if (!checkBlankText(z4)) return false;
	if (!checkBlankText(z5)) return false;
	if (!checkBlankText(z6)) return false;
	if (!checkBlankText(z7)) return false;
	if (!checkBlankText(z8)) return false;
	if (!checkBlankText(z9)) return false;
	if (!checkBlankText(z10)) return false;
	if (!checkBlankText(z11)) return false;
	if (!checkBlankText(z12)) return false;
	if (!checkBlankText(z13)) return false;
	if (!checkBlankText(z14)) return false;
	if (!checkBlankText(z15)) return false;
	if (!checkBlankText(z16)) return false;
	if (!checkBlankText(z17)) return false;
	if (!checkBlankText(z18)) return false;
	return true;
}

function msgFilterErr(msg,obj)
{
	if (!obj) return false;
	obj.focus();
	obj.style.backgroundColor = "wheat";
	alert(msg);
	
	return false;
}


function checkNumber(ff)
{
	var t,r,i,n,f;
	r = new RegExp(".*\\D[\.]","gi");
	i = checkNumber.arguments.length;
	for (n = 0; n < i;n++)
	{
		f = checkNumber.arguments[n];
		if (!f) continue;
		if (f.value == "") return true;
		if (r.test(f.value)) return msgFilterErr("Please fill with Number only",f);
		f.style.backgroundColor = "white";
	}

	return true;
}

function checkBlankAndNumber(ff)
{
	var i,n,f;
	i = checkBlankAndNumber.arguments.length;
	for (n = 0; n < i;n++)
	{
		f = checkBlankAndNumber.arguments[n];
		if (!checkBlankText(f)) return false;
		if (!checkNumber(f)) return false;
	}

	return true;
}

function checkWord(w)
{
	var t,r,i,n,f;
	r = new RegExp("[^A-Za-z0-9_\\.\\,\\- ]","gi");
	i = checkWord.arguments.length;
	for (n = 0; n < i;n++)
	{
		f = checkWord.arguments[n];
		if (!f) continue;
    //alert(f.value);
		if (f.value == "") return true;
		if (r.test(f.value)) return msgFilterErr("Please fill with word [A-Za-z0-9_.,-] only",f);
		if (f.style) f.style.backgroundColor = "";
	}

	return true;
}

function selectCombo(cb,v)
{
	if (!cb.options) return;
	var l = cb.options.length;
	var i;
	for (i=0; i<l;i++)
	{
		if (cb.options[i].value == v)
		{
			cb.options[i].selected = true;
			return;
		}
	}
}

function NewWindow(mypage, myname, w, h, scroll) 
{
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resize=yes'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}

function NewWindow2(mypage, myname, w, h, scroll) 
{
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resize=yes'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}


function intval(str)
{
  var ret,rets;
  with (Math)
  {
    ret = parseInt(str);
    rets = ret = '';
    if (rets == 'NaN') ret = 0;
  }
  return ret;
}

function do_print_frame(framename)
{
  parent[framename].focus();
  parent[framename].print();
}

function ClearCBBox(CbBox)
{
    len = document.all(CbBox,0).options.length ;
    for( i=len-1;i>=0;i--)
      document.all(CbBox,0).options[i]=null ;
}

function docheck_box(y,z,start,end,ops)
{
  var i;
  var obj;
  var chk;
  
  chk = MWJ_findObj(chk_all);
  //chk.checked=true;
  //alert(chk);
  for (i=start; i<=end; i++)
  {
    obj = MWJ_findObj(y+i+z);
    if (obj != null)
    {
      obj.checked = ops;
    }
  }
}


function location_replace(newurl)
{
	window.location.replace(newurl);
}







//------------------------------------------

function MWJ_findObj( oName, oFrame, oDoc ) {
        if( !oDoc ) { if( oFrame ) { oDoc = oFrame.document; } else { oDoc = window.document; } }
        if( oDoc[oName] ) { return oDoc[oName]; } if( oDoc.all && oDoc.all[oName] ) { return oDoc.all[oName]; }
        if( oDoc.getElementById && oDoc.getElementById(oName) ) { return oDoc.getElementById(oName); }
        for( var x = 0; x < oDoc.forms.length; x++ ) { if( oDoc.forms[x][oName] ) { return oDoc.forms[x][oName]; } }
        for( var x = 0; x < oDoc.anchors.length; x++ ) { if( oDoc.anchors[x].name == oName ) { return oDoc.anchors[x]; } }
        for( var x = 0; document.layers && x < oDoc.layers.length; x++ ) {
                var theOb = MWJ_findObj( oName, null, oDoc.layers[x].document ); if( theOb ) { return theOb; } }
        if( !oFrame && window[oName] ) { return window[oName]; } if( oFrame && oFrame[oName] ) { return oFrame[oName]; }
        for( var x = 0; oFrame && oFrame.frames && x < oFrame.frames.length; x++ ) {
                var theOb = MWJ_findObj( oName, oFrame.frames[x], oFrame.frames[x].document ); if( theOb ) { return theOb; } }
        return null;
}



function jsPrint(obj, noPopup)
{
  obj.focus();
  if (!document.all || !noPopup) 
  {
    window.print();
  }
  else
  {
    WB.ExecWB(6,6);
  }
}

// farid
String.prototype.ReplaceAll = function(stringToFind,stringToReplace){
	var temp = this;
	var index = temp.indexOf(stringToFind);
			while(index != -1){
					temp = temp.replace(stringToFind,stringToReplace);
					index = temp.indexOf(stringToFind);
			}
			return temp;
	}

//explode
function explode (delimiter, string, limit) {
    // Splits a string on string separator and return array of components. If limit is positive only limit number of components is returned. If limit is negative all components except the last abs(limit) are returned.  
    // 
    // version: 1004.2314
    // discuss at: http://phpjs.org/functions/explode    // +     original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: kenneth
    // +     improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: d3x
    // +     bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)    // *     example 1: explode(' ', 'Kevin van Zonneveld');
    // *     returns 1: {0: 'Kevin', 1: 'van', 2: 'Zonneveld'}
    // *     example 2: explode('=', 'a=bc=d', 2);
    // *     returns 2: ['a', 'bc=d']
     var emptyArray = { 0: '' };
    
    // third argument is not required
    if ( arguments.length < 2 ||
        typeof arguments[0] == 'undefined' ||        typeof arguments[1] == 'undefined' ) {
        return null;
    }
 
    if ( delimiter === '' ||        delimiter === false ||
        delimiter === null ) {
        return false;
    }
     if ( typeof delimiter == 'function' ||
        typeof delimiter == 'object' ||
        typeof string == 'function' ||
        typeof string == 'object' ) {
        return emptyArray;    }
 
    if ( delimiter === true ) {
        delimiter = '1';
    }    
    if (!limit) {
        return string.toString().split(delimiter.toString());
    } else {
        // support for limit argument        var splitted = string.toString().split(delimiter.toString());
        var partA = splitted.splice(0, limit - 1);
        var partB = splitted.join(delimiter.toString());
        partA.push(partB);
        return partA;    }
}

//implode
function implode (glue, pieces) {
    // Joins array elements placing glue string between items and return one string  
    // 
    // version: 1004.2314
    // discuss at: http://phpjs.org/functions/implode    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Waldo Malqui Silva
    // +   improved by: Itsacon (http://www.itsacon.net/)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: implode(' ', ['Kevin', 'van', 'Zonneveld']);    // *     returns 1: 'Kevin van Zonneveld'
    // *     example 2: implode(' ', {first:'Kevin', last: 'van Zonneveld'});
    // *     returns 2: 'Kevin van Zonneveld'
    var i = '', retVal='', tGlue='';
    if (arguments.length === 1) {        pieces = glue;
        glue = '';
    }
    if (typeof(pieces) === 'object') {
        if (pieces instanceof Array) {            return pieces.join(glue);
        }
        else {
            for (i in pieces) {
                retVal += tGlue + pieces[i];                tGlue = glue;
            }
            return retVal;
        }
    }    else {
        return pieces;
    }
}

// allowing input number only
// onkeypress="return isNumberKey(event);"
function isNumberKey(evt)
{
	 var charCode = (evt.which) ? evt.which : evt.keyCode;
	 if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=45)
   {
			return false;
   }

	 return true;
}

//php str_replace like
function str_replace(search, replace, subject, count) {
    // Replaces all occurrences of search in haystack with replace  
    // 
    // version: 1009.2513
    // discuss at: http://phpjs.org/functions/str_replace    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Gabriel Paderni
    // +   improved by: Philip Peterson
    // +   improved by: Simon Willison (http://simonwillison.net)
    // +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)    // +   bugfixed by: Anton Ongson
    // +      input by: Onno Marsman
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    tweaked by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   input by: Oleg Eremeev
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Oleg Eremeev
    // %          note 1: The count parameter must be passed as a string in order    // %          note 1:  to find a global variable in which the result will be given
    // *     example 1: str_replace(' ', '.', 'Kevin van Zonneveld');
    // *     returns 1: 'Kevin.van.Zonneveld'
    // *     example 2: str_replace(['{name}', 'l'], ['hello', 'm'], '{name}, lars');
    // *     returns 2: 'hemmo, mars'    var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
            f = [].concat(search),
            r = [].concat(replace),
            s = subject,
            ra = r instanceof Array, sa = s instanceof Array;    s = [].concat(s);
    if (count) {
        this.window[count] = 0;
    }
     for (i=0, sl=s.length; i < sl; i++) {
        if (s[i] === '') {
            continue;
        }
        for (j=0, fl=f.length; j < fl; j++) {            temp = s[i]+'';
            repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
            s[i] = (temp).split(f[j]).join(repl);
            if (count && s[i] !== temp) {
                this.window[count] += (temp.length-s[i].length)/f[j].length;}        }
    }
    return sa ? s : s[0];
}