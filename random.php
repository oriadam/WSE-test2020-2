<html>
<head>
<style>
#out
{
	white-space: pre;
}
</style>
</head>
<body>
<div id="out">
</div>
</body>
</html>
<script>
let out = document.querySelector('#out');
let abc='אבגדהוזחטיכלמנסעפצקרשת';
let c = ()=>abc.charAt(Math.random()*abc.length);
var w = ()=>c()+c()+c()+c()+c()+c()+c();
for(let i=0;i<10;i++)
	out.innerHTML+='\n'+w();

</script>