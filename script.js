window.onload = () => {
    const group = document.getElementById("group");

    group.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisGroup = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "school.php");
        xhr.responseType = 'text';
        xhr.send(thisGroup);

        xhr.onload = () => {
            document.getElementById("content").innerHTML = xhr.responseText;
        }
    })

    const teacher = document.getElementById("teacher");

    teacher.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisTeacher = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "school.php");
        xhr.responseType = 'json';
        xhr.send(thisTeacher);

        xhr.onload = () => {
            document.getElementById("content").innerHTML = xhr.response;
        }
    })

    const auditorium = document.getElementById("auditorium");

    auditorium.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisAuditorium = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "school.php");
        xhr.responseType = 'document';
        xhr.send(thisAuditorium);

        xhr.onload = () => {
            document.getElementById("content").innerHTML = xhr.responseXML.body.innerHTML;
        }
    })
}


