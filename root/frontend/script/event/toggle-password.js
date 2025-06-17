const path = "../asset/image/icon/";

const inputs = document.querySelectorAll(
  '.password-toggle-wrapper > input[type="password"]',
  '.password-toggle-wrapper > input[type="text"]'
);

inputs.forEach((input) => {
  const icon = input.parentElement.querySelector(
    ".password-toggle-wrapper > img"
  );

  const displayIcon = () => {
    icon.style.display = "inline-block";
  };
  const hideIcon = () => {
    icon.style.display = "none";
  };

  input.addEventListener("click", displayIcon);
  input.addEventListener("mouseover", displayIcon);
  input.addEventListener("mouseout", hideIcon);

  icon.addEventListener("mouseover", displayIcon);
  icon.addEventListener("mouseout", hideIcon);

  icon.onclick = (e) => {
    e.stopPropagation();
    if (input.type === "password") {
      input.type = "text";
      icon.src = `${path}hide.svg`;
    } else {
      input.type = "password";
      icon.src = `${path}show.svg`;
    }
  };
});
