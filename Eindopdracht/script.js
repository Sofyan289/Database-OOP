function toggleMenu() {
    var sidebar = document.getElementById('sidebar');
    var content = document.querySelector('.content');
  
    if (sidebar.style.left === '-250px') {
      sidebar.style.left = '0';
      content.style.marginLeft = '250px';
    } else {
      sidebar.style.left = '-250px';
      content.style.marginLeft = '0';
    }
  }
  
  function closeMenu() {
    var sidebar = document.getElementById('sidebar');
    var content = document.querySelector('.content');
  
    sidebar.style.left = '-250px';
    content.style.marginLeft = '0';
  }
   
  