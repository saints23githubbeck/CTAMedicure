<script>
    var array = {
      'status':1,
      'status':0
             
       
    };
    for(var abc in array){
        var val = array[abc];
        document.write(val + '<br>');

    }
    alert(array.status);
</script>
<script>
    var arr = {
    "Company Name": 'Flexiple',
    "ID": 123
};
for (var key in arr) {
    var value = arr[key];
    document.write(key + " = " + value + '');
}
// //Output: 
// Company Name = Flexiple
// ID = 123
</script>