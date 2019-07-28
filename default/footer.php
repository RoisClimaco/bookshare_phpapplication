<!---- Footer ----->
<br><br>
</div>
</div>
<br/>
<p class="text-center">
  <small id="passwordHelpInline" class="text-muted"> Developer: Rolando Climaco @2019 <br> Credits: <a href="https://getbootstrap.com/docs/4.3/getting-started/download/">boostrap v4.3</a> <a href="https://bootswatch.com/minty/">Minty theme</a></small>
</p>
</div>
<script>
// Navbar Sticky logic
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navigationbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>
