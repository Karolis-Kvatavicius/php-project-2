// function makeFileList() {
//     var input = document.getElementById("file");
//     var ul = document.getElementById("fileList");
//     while (ul.hasChildNodes()) {
//       ul.removeChild(ul.firstChild);
//     }
//     for (var i = 0; i < input.file.length; i++) {
//       var li = document.createElement("li");
//       console.log(input.file);
//       li.innerHTML = '<img src="'+input.file[i].name+'" alt="'+input.file[i].name+'">';
//       ul.appendChild(li);
//     }
//     if(!ul.hasChildNodes()) {
//       var li = document.createElement("li");
//       li.innerHTML = 'No Files Selected';
//       ul.appendChild(li);
//     }
// }

$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});

