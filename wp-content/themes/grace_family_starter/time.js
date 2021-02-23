const nextMeet = new Date("March 7, 2021 16:30:00");
let timeTill = (new Date("March 7, 2021 16:30:00")) - Date.now();

function adjustTime(newTime) {
  const days = Math.floor(newTime / 1000 / 60 / 60 / 24);
  const hours = Math.floor(newTime / 1000 / 60 / 60) - days * 24;
  const minutes = Math.floor(newTime / 1000 / 60) - hours * 60;
  const seconds = Math.floor(newTime / 1000) - minutes * 60;

  console.log(days);
  console.log(hours);
  console.log(minutes);
}

adjustTime(timeTill);