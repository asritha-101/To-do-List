document.addEventListener("DOMContentLoaded", () => {
    const taskInput = document.getElementById("task-input");
    const addTaskBtn = document.getElementById("add-task-btn");
    const taskList = document.getElementById("task-list");
    function addTask() {
        const taskText = taskInput.value.trim();
        if (taskText !== "") {
            const li = document.createElement("li");
            li.classList.add("task");
            const taskSpan = document.createElement("span");
            taskSpan.textContent = taskText;
            li.appendChild(taskSpan);
            const completeBtn = document.createElement("button");
            completeBtn.textContent = "Complete";
            completeBtn.classList.add("complete-btn");
            li.appendChild(completeBtn);
            const deleteBtn = document.createElement("button");
            deleteBtn.textContent = "Delete";
            deleteBtn.classList.add("delete-btn");
            li.appendChild(deleteBtn);
            taskList.appendChild(li);
            taskInput.value = "";
        }
    }
    function handleTaskAction(e) {
        const target = e.target;
        const task = target.parentElement;
        if (target.classList.contains("complete-btn")) {
            task.classList.toggle("completed");
        } else if (target.classList.contains("delete-btn")) {
            task.remove();
        }
    }
    addTaskBtn.addEventListener("click", addTask);
    taskList.addEventListener("click", handleTaskAction);
});
