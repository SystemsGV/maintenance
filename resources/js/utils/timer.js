
export const humanReadableTime = (minutes) => {
  return `${minutes}min`;
}

export const convertToMinutes = (value) => {
  if (value.includes(':')) { // Formato: 10:30
    const [hours, minutes] = value.split(':').map(Number);
    return (hours * 60) + minutes;
  } else {
    // Formato: 1.5, 1,5, o 90
    const number = value.replace(',', '.'); // Convertir coma a punto
    return Math.round(parseFloat(number) * 60); // Convertir a minutos
  }
};

export const isTimeValueValid = (value) => {
  // Valid values: 1:00, 10:30, 90, 1.5, 2.5, 1,5
  return /^(\d{1,2}:[0-5][0-9])$|^(\d{1,3}\.\d{1,2})$|^(\d{1,3},\d{1,2})$|^\d{1,3}$/.test(value);
};
