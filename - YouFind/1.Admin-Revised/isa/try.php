<!DOCTYPE html>
<html>
<head>
<title>File API – FileReader as Data URL</title>
</head>
<body>
<header>
<h1>File API – FileReader</h1>
</header>
<article>
<label for=”files”>Select multiple files: </label>
<input id=”files” type=”file[]” multiple/>
<button type=”button” id=”clear”>Clear</button>
<output id=”result” />
</article>
</body>
</html>


<script type="text/javascript">

window.onload = function(){
//Check File API support
if(window.File && window.FileList && window.FileReader)
{
$(‘#files’).live(“change”, function(event) {
var files = event.target.files; //FileList object
var output = document.getElementById(“result”);
for(var i = 0; i< files.length; i++)
{
var file = files[i];
//Only pics
// if(!file.type.match(‘image’))
if(file.type.match(‘image.*’)){
if(this.files[0].size < 2097152){
// continue;
var picReader = new FileReader();
picReader.addEventListener(“load”,function(event){
var picFile = event.target;
var div = document.createElement(“div”);
div.innerHTML = “<img class=’thumbnail’ src='” + picFile.result + “‘” +
“title=’preview image’/>”;
output.insertBefore(div,null);
});
//Read the image
$(‘#clear, #result’).show();
picReader.readAsDataURL(file);
}else{
alert(“Image Size is too big. Minimum size is 2MB.”);
$(this).val(“”);
}
}else{
alert(“You can only upload image file.”);
$(this).val(“”);
}
}

});
}
else
{
console.log(“Your browser does not support File API”);
}
}

$(‘#files’).live(“click”, function() {
$(‘.thumbnail’).parent().remove();
$(‘result’).hide();
$(this).val(“”);
});

$(‘#clear’).live(“click”, function() {
$(‘.thumbnail’).parent().remove();
$(‘#result’).hide();
$(‘#files’).val(“”);
$(this).hide();
});

 
</script>

<style type="text/css">

body{
font-family: ‘Segoe UI’;
font-size: 12pt;
}

header h1{
font-size:12pt;
color: #fff;
background-color: #1BA1E2;
padding: 20px;

}
article
{
width: 80%;
margin:auto;
margin-top:10px;
}

.thumbnail{

height: 100px;
margin: 10px;
float: left;
}
#clear{
display:none;
}
#result {
border: 4px dotted #cccccc;
display: none;
float: right;
margin:0 auto;
width: 511px;
}

</style>

