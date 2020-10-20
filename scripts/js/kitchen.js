var KitchenLight = document.getElementById("kitchenLight");
var Kitchen = document.getElementById("Air");

var kitchenControl = [KitchenLight, Kitchen]

kitchenControl[0].classList.add('push-room-control-down');
kitchenControl[1].classList.add('push-room-control-down');

function openKitchenLight() {
    kitchenControl[0].classList.remove('push-room-control-down');
    kitchenControl[0].classList.add('slide-in-bottom');
    kitchenControl[0].classList.remove('slide-out-bottom');
    if (kitchenControl[1].classList.contains('slide-in-bottom')) {
        closeKitchenAc();
    }
}

function closeKitchenLight() {
    kitchenControl[0].classList.add('push-room-control-down');
    kitchenControl[0].classList.add('slide-out-bottom');
    kitchenControl[0].classList.remove('slide-in-bottom');
}

function openKitchenAc() {
    kitchenControl[1].classList.remove('push-room-control-down');
    kitchenControl[1].classList.add('slide-in-bottom');
    kitchenControl[1].classList.remove('slide-out-bottom');
    if (kitchenControl[0].classList.contains('slide-in-bottom')) {
        closeKitchenLight();
    }
}

function closeKitchenAc() {
    kitchenControl[1].classList.add('push-room-control-down');
    kitchenControl[1].classList.add('slide-out-bottom');
    kitchenControl[1].classList.remove('slide-in-bottom');
}