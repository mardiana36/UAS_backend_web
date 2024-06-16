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
function alertSuksess(title, text, link) {
  swal({
    title: title,
    text: text,
    icon: 'success',
    dangerMode: true,
  })
    .then(willDelete => {
      if (willDelete) {
        window.location.href = link;
      }
    });
}
function alertConfirm(title, text, link) {
  swal({
    title: title,
    text: text,
    icon: 'warning',
    buttons: {
      cancel: "Cancel",
      confirm: {
        text: "Yes, Logout!!",
        value: true,
        visible: true,
        className: "confirm-button",
        closeModal: true
      }
    },
    dangerMode: true,
    })
    .then(willDelete => {
        if (willDelete) {
          window.location.href = link;
          
        }
    });
  
}