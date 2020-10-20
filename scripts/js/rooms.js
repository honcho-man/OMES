const KitchenBtn = document.getElementById("KitchenBtn");
const LivingBtn = document.getElementById("LivingBtn");
const BedBtn = document.getElementById("BedBtn");
const ToiletBtn = document.getElementById("ToiletBtn");

const RoomsBtn = [KitchenBtn, LivingBtn, BedBtn, ToiletBtn];
//kitchen-0 livingroom-1 bedroom-2 toilet-3

const KitchenDev = document.getElementById("KitchenDev");
const LivingDev = document.getElementById("LivingDev");
const BedDev = document.getElementById("BedDev");
const ToiletDev = document.getElementById("ToiletDev");

const RoomsDev = [KitchenDev, LivingDev, BedDev, ToiletDev];
//kitchen-0 livingroom-1 bedroom-2 toilet-3
//hide other rooms and leave out the kitchen
RoomsDev[1].classList.add('force-hide');
RoomsDev[2].classList.add('force-hide');
RoomsDev[3].classList.add('force-hide');


function openKitchen() {
    RoomsDev[0].classList.remove('force-hide');
    RoomsBtn[0].classList.add('active-room');
    closeLiving();
    closeBed()
    closeToilet()
}

function closeKitchen() {
    RoomsBtn[0].classList.remove('active-room');
    RoomsDev[0].classList.add('force-hide');
}

function openLiving() {
    RoomsDev[1].classList.remove('force-hide');
    RoomsBtn[1].classList.add('active-room');
    closeKitchen();
    closeBed();
    closeToilet()
}

function closeLiving() {
    RoomsBtn[1].classList.remove('active-room');
    RoomsDev[1].classList.add('force-hide');
}

function openBed() {
    RoomsDev[2].classList.remove('force-hide');
    RoomsBtn[2].classList.add('active-room');
    closeKitchen();
    closeLiving();
    closeToilet()
}

function closeBed() {
    RoomsBtn[2].classList.remove('active-room');
    RoomsDev[2].classList.add('force-hide');
}

function openToilet() {
    RoomsDev[3].classList.remove('force-hide');
    RoomsBtn[3].classList.add('active-room');
    closeKitchen();
    closeLiving();
    closeBed();
}

function closeToilet() {
    RoomsBtn[3].classList.remove('active-room');
    RoomsDev[3].classList.add('force-hide');
}
//kitchen light control