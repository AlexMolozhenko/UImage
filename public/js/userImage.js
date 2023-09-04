let current_page = 1;
let last_page = 1;
const NEXT_PAGE_ACTION = 'next';
const PREVIOUS_PAGE_ACTION = 'previous';
let lastPage = $('.lastPage');
let curPage = $('.currentPage');
let order_user = 'desc';

$(document).ready(function() {
    loadUsers();


});
$('#create-user-form').on('submit',function(e) {
    e.preventDefault();
    createUser();
});

function setLastPage(count){
    lastPage.empty();
    lastPage.append(count);
}
function setCurrentPage(num){
    curPage.empty();
    curPage.append(num);
}
 switcherPage = function(action){

    switch (action) {
        case 'next':
            if(current_page<last_page){
                current_page++
                loadUsers()
            }
            break;
        case 'previous':
            if(current_page>1){
                current_page--
                loadUsers()
            }
            break;
    }
}

$('.nextPage').on('click',function(){
    switcherPage(NEXT_PAGE_ACTION)
});

$('.previousPage').on('click',function(){
    switcherPage(PREVIOUS_PAGE_ACTION)
});

$('.selectedOrder').on('change',function(event){
    order_user = event.target.value;
    loadUsers()
})

function loadUsers() {

    $.ajax({
        url: 'api/user/' + current_page +'/' + order_user,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            last_page = data.last_page;
            setLastPage(last_page);
            if (current_page < last_page) {
                setCurrentPage(current_page);
                displayUsers(data.data);
            }
        },
        error: function (error) {
            console.error("Error:", error);
        }
    });
}
    function createUser() {
    var form = $('#create-user-form')[0];
        var formData = new FormData(form);
        $.ajax({
            url: 'api/store',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                loadUsers();
                form.reset();
            },
            error:function (error) {
                console.error("Error:", error);
            }
        });
    }

    function displayUsers(users) {
        var tbody = $('#users-table tbody');
        tbody.empty();
        users.forEach(function (user) {
            var row = '<tr>' +
                '<td>' + user.name + '</td>' +
                '<td>' + user.city + '</td>' +
                '<td>' + user.user_images_count + '</td>' +
                '</tr>';
            tbody.append(row);

        });
        var separator = '<tr class="trSeparator">' +
            '<td>' + '</td>' +
            '<td>' + '</td>' +
            '<td>' + '</td>' +
            '</tr>';
        tbody.append(separator);
    }
