  function showSweetAlert(title, text) {
    swal({
      title: title,
      text: text,
      icon: "error",
      button: 'OK'
    });
}
  
function alertWarning(title, text, link) {
  swal({
    title: title,
    text: text,
    icon: 'warning',
    dangerMode: true,
    })
    .then(willDelete => {
        if (willDelete) {
            window.location.href = link;
        }
    });
  
}