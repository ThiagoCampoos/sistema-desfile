function padZero(num) {
    return String(num).padStart(2, '0');
}

function isValidDate(year, month, day) {
    if (year <= 0 || month < 1 || month > 12 || day < 1 || day > 31) return false;
    const date = new Date(year, month - 1, day);
    return (
        date.getFullYear() === year &&
        date.getMonth() + 1 === month &&
        date.getDate() === day
    );
}

function formatToISO(date) {
    const year = date.getFullYear();
    const month = padZero(date.getMonth() + 1);
    const day = padZero(date.getDate());
    return `${year}-${month}-${day}`;
}

function parseDate(dateString) {
    const trimmed = dateString.trim();

    const isoRegex = /^\d{4}-\d{2}-\d{2}$/;
    if (isoRegex.test(trimmed)) {
        const date = new Date(trimmed);
        if (!isNaN(date)) return date;
    }

    const separator = trimmed.includes('/') ? '/' : trimmed.includes('-') ? '-' : null;
    if (!separator) return null;

    const parts = trimmed.split(separator).map(part => parseInt(part, 10));
    if (parts.length !== 3) return null;

    const interpretations = [
        {day: parts[0], month: parts[1], year: parts[2]},
        {day: parts[1], month: parts[0], year: parts[2]},
        {day: parts[2], month: parts[1], year: parts[0]}
    ];

    for (const {year, month, day} of interpretations) {
        if (isValidDate(year, month, day)) {
            return new Date(year, month - 1, day);
        }
    }

    return null;
}

export default () => ({
    toUSDateFormat(dateString) {
        const date = parseDate(dateString);
        return date ? formatToISO(date) : dateString;
    },

    toBRDateFormat(dateString) {
        const date = parseDate(dateString);
        if (date) {
            const day = padZero(date.getDate());
            const month = padZero(date.getMonth() + 1);
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }
        return dateString;
    },
});
