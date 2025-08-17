export function simplifyDate(dateInput) {
    const date = new Date(dateInput);
    const now = new Date();

    const paramDate = date.toISOString().slice(0, 10);
    const currentDate = now.toISOString().slice(0, 10);

    return paramDate !== currentDate
        ? paramDate
        : date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
}
