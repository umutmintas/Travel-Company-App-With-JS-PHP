<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "Todo List";
global $baglanti;
include("ad-include/ahead.php");

if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='kullanıcı.php'}}) </script>";
    exit;
}



/*
if (isset($_POST['yetki']) && $_SESSION["yetki"] == "2") {
    //Seçilenleri pdo ile toplu silme kodu:
    $silinecekler = implode(', ', $_POST['sil']);
    $sorgu = $baglanti->prepare('DELETE FROM contact_page WHERE İD IN (' . $silinecekler . ')');
    $sorgu->execute();
}
*/

?>


<div class="container my-5">
    <div class="row justify-content-center">
        <div style="min-width: 1000px" class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Todo List</h4>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" id="taskInput" class="form-control" placeholder="Yeni Görev Ekle">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="addTask()">Görevi Ekle</button>
                        </div>
                    </div>
                    <p id="taskList" class="scrool list-group"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f0f0;
    }


    .completed {
        text-decoration: line-through;
        color: #4e85d7;
    }


    .scrool {

        padding: 10px;
        overflow-x: auto;
        word-break: normal;

    }

</style>

<!--- Sonradan Eklenen cdn ler Todo list için  -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

        displayTasks();

        window.addTask = function() {
            const taskInput = $("#taskInput");
            const taskText = taskInput.val().trim();

            if (taskText !== "") {
                const newTask = {
                    id: Date.now(),
                    text: taskText,
                    completed: false,
                };

                tasks.push(newTask);
                saveTasks();
                displayTasks();
                taskInput.val("");
            }
        };

        window.toggleTask = function(taskId) {
            const taskIndex = tasks.findIndex(task => task.id === taskId);
            tasks[taskIndex].completed = !tasks[taskIndex].completed;
            saveTasks();
            displayTasks();
        };

        window.deleteTask = function(taskId) {
            const confirmation = confirm("Are you sure you want to delete this task?");
            if (confirmation) {
                tasks = tasks.filter(task => task.id !== taskId);
                saveTasks();
                displayTasks();
            }
        };

        function displayTasks() {
            const taskList = $("#taskList");
            taskList.empty();

            tasks.forEach(function(task) {
                const taskItem = $("<p>").addClass("scrool mb-3 list-group-item d-flex justify-content-between align-items-center");
                const taskText = $("<span>").text(task.text).addClass(task.completed ? "completed" : "");
                const toggleButton = $("<button>").text("Tamamlandı").addClass("btn btn-outline-success btn-sm d-flex").click(function() {
                    toggleTask(task.id);
                });
                const deleteButton = $("<button>").text("Sil").addClass("btn btn-outline-danger btn-sm ml-2").click(function() {
                    deleteTask(task.id);
                });

                taskItem.append(taskText, toggleButton, deleteButton);
                taskList.append(taskItem);
            });
        }

        function saveTasks() {
            localStorage.setItem("tasks", JSON.stringify(tasks));
        }
    });
</script>

</html>