/**
 * Category create url
 *
 * @type {string}
 */
const CATEGORY_CREATE_URL = '/category/create';

/**
 * Task create url
 *
 * @type {string}
 */
const TASK_CREATE_URL = '/task/create';

/**
 * Category creation
 *
 * @return void
 */
var createCategory = function () {
    $('#categoryBtn').bind('click', function () {
        $.ajax({
           type: 'POST',
           url: CATEGORY_CREATE_URL,
           data: $('#create-category').serialize(),
           dataType: 'json',
           success: function (data) {
               console.log(data);
           },
           error: function (data) {
               $('body').append(data.responseText);
           }
       });
    });
};

/**
 * 
 */
var taskClick = function () {
    $('#task-btn').bind('click', function () {
        $.ajax({
           type: 'POST',
           url: TASK_CREATE_URL,
           data: $('#task-create').serialize(),
           dataType: 'json',
           success: function (data) {
               console.log(data);
           },
           error: function (data) {
               $('body').append(data.responseText);
           }
       });
    });
};

$(document).ready(function () {
    createCategory();
    taskClick();
});