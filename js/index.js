/*Voice Speech Recognition*/
if (annyang) {
    var commands = {
        'write my email address *tag': function (variable) {
            let emailadd = document.getElementById("emailadd");
            emailadd.value = variable.split(" ").join("");
        },
        'write receivers email address *tag': function (variable) {
            let uname = document.getElementById("uname");
            uname.value = variable.split(" ").join("");
        },
        'write the subject *tag': function (variable) {
            let subject = document.getElementById("subject");
            subject.value = variable;
        },
        'write the message *tag': function (variable) {
            let message = document.getElementById("mymessage");
            message.value = variable;
        },
        'send it': function () {
            let formgroup = document.getElementById("form-group");
            let formareainner = document.querySelector('.box');
            let heading = document.querySelector('.box h1');
            formgroup.remove();
            heading.innerHTML = "Sent Successfully"
            let html = "";
            html += '<p>Thank you for using our service</p>';
            formareainner.innerHTML = html;
        }
    };
    annyang.addCommands(commands);
    annyang.start();
}


/*Clock*/
setInterval(() => {
    d = new Date();
    htime = d.getHours();
    mtime = d.getMinutes();
    stime = d.getSeconds();
    hrotation = 30*htime+mtime/2;
    mrotation = 6*mtime;
    srotation = 6*stime;

    hour.style.transform = `rotate(${hrotation}deg)`;
    minute.style.transform = `rotate(${mrotation}deg)`;
    second.style.transform = `rotate(${srotation}deg)`;
}, 1000);

