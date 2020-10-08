function openHideWelcome() {
    var hiddenText = document.getElementById("hideWelcome");
    var HideBtn = document.getElementById("openTextBtn");
    if (hiddenText.classList.contains('hide')) {
        hiddenText.classList.remove('hide');
        hiddenText.classList.add('display');
        hiddenText.classList.add('appear');
        HideBtn.classList.add("force-hide");
    }
}
const courseOne = document.getElementById("CourseOne");
const courseTwo = document.getElementById("CourseTwo");
const courseThree = document.getElementById("CourseThree");
const courseFour = document.getElementById("CourseFour");

const courses = [courseOne, courseTwo, courseThree, courseFour];
courses[1].classList.add('hide');
courses[2].classList.add('hide');
courses[3].classList.add('hide');

const coursesBtnOne = document.getElementById("cOne");
const coursesBtnTwo = document.getElementById("cTwo");
const coursesBtnThree = document.getElementById("cThree");
const coursesBtnFour = document.getElementById("cFour");

const coursesBtn = [coursesBtnOne, coursesBtnTwo, coursesBtnThree, coursesBtnFour];

function openCourseOne() {
    courses[0].classList.remove('hide');
    courses[0].classList.add('appear');
    coursesBtn[0].classList.add('active-course');
    closeCourseTwo();
    closeCourseThree();
    closeCourseFour();
}

function closeCourseOne() {
    courses[0].classList.add('hide');
    courses[0].classList.add('disappear');
    coursesBtn[0].classList.remove('active-course');
}

function openCourseTwo() {
    courses[1].classList.remove('hide');
    courses[1].classList.add('appear');
    coursesBtn[1].classList.add('active-course');
    closeCourseOne();
    closeCourseThree();
    closeCourseFour();
}

function closeCourseTwo() {
    courses[1].classList.add('hide');
    courses[1].classList.add('disappear');
    coursesBtn[1].classList.remove('active-course');
}

function openCourseThree() {
    courses[2].classList.remove('hide');
    courses[2].classList.add('appear');
    coursesBtn[2].classList.add('active-course');
    closeCourseOne();
    closeCourseTwo();
    closeCourseFour();
}

function closeCourseThree() {
    courses[2].classList.add('hide');
    courses[2].classList.add('disappear');
    coursesBtn[2].classList.remove('active-course');
}


function openCourseFour() {
    courses[3].classList.remove('hide');
    courses[3].classList.add('appear');
    coursesBtn[3].classList.add('active-course');
    closeCourseOne();
    closeCourseTwo();
    closeCourseThree();
}

function closeCourseFour() {
    courses[3].classList.add('hide');
    courses[3].classList.add('disappear');
    coursesBtn[3].classList.remove('active-course');
}