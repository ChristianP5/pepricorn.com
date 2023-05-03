let currVal = 1;
const quantity = document.querySelector("#quantity");
const minus = document.querySelector("#minus");
const plus = document.querySelector("#plus");
const variant = document.querySelector(".variant");
const variant2 = document.querySelector(".variant2");

const productPrice = document.querySelector("#product-price");
let strProductPrice = productPrice.textContent;
strProductPrice = strProductPrice.replace(".", "");
strProductPrice = strProductPrice.replace("Rp", "");
let intProductPrice = parseInt(strProductPrice);
console.log(intProductPrice);

const totalPrice = document.querySelector("#total-price");
let strTotalPrice = totalPrice.textContent;
strTotalPrice = strTotalPrice.replace(".", "");
strTotalPrice = strTotalPrice.replace("Rp", "");
let intTotalPrice = parseInt(strTotalPrice);

minus.addEventListener("click", function () {
  if (currVal > 1) {
    currVal--;
    quantity.textContent = currVal;

    //calculate total price
    intTotalPrice -= intProductPrice;
    //convert back to string
    strTotalPrice = intTotalPrice.toLocaleString();
    strTotalPrice = strTotalPrice.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    totalPrice.textContent = "Rp" + strTotalPrice;
  }
});

plus.addEventListener("click", function () {
  currVal++;
  quantity.textContent = currVal;

  //calculate total price
  intTotalPrice += intProductPrice;
  //convert back to string
  strTotalPrice = intTotalPrice.toLocaleString();
  strTotalPrice = strTotalPrice.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

  totalPrice.textContent = "Rp" + strTotalPrice;
});

variant.addEventListener("click", function () {
  variant2.classList.add("bg-white");
  variant2.classList.remove("border-2");
  variant2.classList.remove("border-blue-600");

  variant.classList.remove("bg-white");
  variant.classList.add("border-2");
  variant.classList.add("border-blue-600");
});

variant2.addEventListener("click", function () {
  variant.classList.add("bg-white");
  variant.classList.remove("border-2");
  variant.classList.remove("border-blue-600");

  variant2.classList.remove("bg-white");
  variant2.classList.add("border-2");
  variant2.classList.add("border-blue-600");
});

//post button
const postComment = document.querySelector("#post-comment");
postComment.addEventListener("click", function (event) {
  const comment = document.querySelector("#comment");

  if (comment.value != "") {
    //comment section profile
    const name = "Guest Account";
    //date
    const months = [
      "Jan.",
      "Feb.",
      "Mar.",
      "Apr.",
      "May",
      "Jun.",
      "Jul.",
      "Aug.",
      "Sep.",
      "Oct.",
      "Nov.",
      "Dec.",
    ];

    const today = new Date();
    const month = months[today.getMonth()];
    const day = String(today.getDate());
    const year = today.getFullYear();
    const dateString = `${month} ${day}, ${year}`;

    //Create the article element
    const article = document.createElement("article");
    article.classList.add(
      "p-6",
      "mb-6",
      "text-base",
      "bg-white",
      "rounded-lg",
      "shadow-md"
    );
    /* article.setAttribute("data-aos", "fade-up"); */

    //create the footer element
    const footer = document.createElement("footer");
    footer.classList.add("flex", "justify-between", "items-center", "mb-2");

    //create the p element
    const p = document.createElement("p");
    p.classList.add("text-gray-500");
    let pText = document.createTextNode(comment.value);
    comment.value = "";
    p.appendChild(pText);

    //create  the div element
    const div = document.createElement("div");
    div.classList.add("flex", "items-center", "mt-4", "space-x-4");

    // Append the footer, p, and div to the article element
    article.appendChild(footer);
    article.appendChild(p);
    article.appendChild(div);

    // Add the article element as the 3rd child of a div
    const commentSection = document.querySelector("#comment-section");
    const thirdChild = commentSection.children[2];
    commentSection.insertBefore(article, thirdChild);

    //inside of footer
    const footer_div = document.createElement("div");
    footer_div.classList.add("flex", "items-center");

    const footer_button = document.createElement("button");
    footer_button.classList.add(
      "inline-flex",
      "items-center",
      "p-2",
      "text-sm",
      "font-medium",
      "text-center",
      "text-gray-400",
      "bg-white",
      "rounded-lg",
      "hover:bg-gray-100",
      "focus:ring-4",
      "focus:outline-none",
      "focus:ring-gray-50"
    );
    footer_button.setAttribute("type", "button");
    //add the footer_div and footer_button to footer
    footer.appendChild(footer_div);
    footer.appendChild(footer_button);

    //inside of footer_div
    const footer_div_p = document.createElement("p");
    footer_div_p.classList.add(
      "inline-flex",
      "items-center",
      "mr-3",
      "text-sm",
      "text-gray-900"
    );

    const footer_div_p_2 = document.createElement("p");
    footer_div_p_2.classList.add("text-sm", "text-gray-600");
    footer_div_p_2.textContent = dateString;
    //add the footer_div_p and footer_div_p_2 to footer_div;
    footer_div.appendChild(footer_div_p);
    footer_div.appendChild(footer_div_p_2);

    //inside of footer_div_p
    const footer_div_p_img = document.createElement("img");
    footer_div_p_img.classList.add("mr-2", "w-6", "h-6", "rounded-full");
    footer_div_p_img.setAttribute("src", "img/default.png");
    footer_div_p_img.setAttribute("alt", name);

    //add footer_div_p_img to footer_div_p
    footer_div_p.appendChild(footer_div_p_img);
    pText = document.createTextNode(name);
    footer_div_p.appendChild(pText);

    //inside footer_button
    const footer_button_svg = document.createElementNS(
      "http://www.w3.org/2000/svg",
      "svg"
    );
    footer_button_svg.classList.add("w-5", "h-5");
    footer_button_svg.setAttribute("aria-hidden", "true");
    footer_button_svg.setAttribute("fill", "currentColor");
    footer_button_svg.setAttribute("viewBox", "0 0 20 20");

    //add footer_button_svg to footer_button
    footer_button.appendChild(footer_button_svg);

    //inside of footer_button_svg
    const footer_button_svg_path = document.createElementNS(
      "http://www.w3.org/2000/svg",
      "path"
    );
    footer_button_svg_path.setAttribute(
      "d",
      "M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
    );
    //add footer_button_svg_path to footer_button_svg
    footer_button_svg.appendChild(footer_button_svg_path);

    //inside div
    const div_button = document.createElement("div");
    div_button.classList.add(
      "flex",
      "items-center",
      "text-sm",
      "text-gray-500",
      "hover:underline",
      "cursor-pointer"
    );
    div_button.setAttribute("type", "button");

    const div_button_svg = document.createElementNS(
      "http://www.w3.org/2000/svg",
      "svg"
    );
    div_button_svg.setAttribute("aria-hidden", "true");
    div_button_svg.setAttribute("class", "mr-1 w-4 h-4");
    div_button_svg.setAttribute("fill", "none");
    div_button_svg.setAttribute("stroke", "currentColor");
    div_button_svg.setAttribute("viewBox", "0 0 24 24");

    const div_button_svg_path = document.createElementNS(
      "http://www.w3.org/2000/svg",
      "path"
    );
    div_button_svg_path.setAttribute("stroke-linecap", "round");
    div_button_svg_path.setAttribute("stroke-linejoin", "round");
    div_button_svg_path.setAttribute("stroke-width", "2");
    div_button_svg_path.setAttribute(
      "d",
      "M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
    );
    div_button_svg.appendChild(div_button_svg_path);

    const div_button_text = document.createTextNode("Reply");

    div_button.appendChild(div_button_svg);
    div_button.appendChild(div_button_text);

    div.appendChild(div_button);
  } else {
    postComment.classList.remove(
      "hover:bg-blue-800",
      "transition",
      "duration-250",
      "ease-in"
    );
    postComment.classList.add("shake");
    postComment.classList.add("bg-red-600"); // Change to red using Tailwind's class
    postComment.classList.remove("bg-blue-600"); // Remove original blue class

    setTimeout(function () {
      postComment.classList.remove("bg-red-600"); // Remove red class
      postComment.classList.add("bg-blue-600"); // Add back original blue class
      postComment.classList.add(
        "hover:bg-blue-800",
        "transition",
        "duration-250",
        "ease-in"
      );
    }, 500); // Change back to blue after 500ms (same duration as animation)
  }

  postComment.addEventListener("animationend", function () {
    postComment.classList.remove("shake");
  });
});

//item image
const itemPicture = document.querySelector("#item-picture");
const itemPicture1 = document.querySelector("#item-picture-1");
const itemPicture2 = document.querySelector("#item-picture-2");
const itemPicture3 = document.querySelector("#item-picture-3");
const itemPicture4 = document.querySelector("#item-picture-4");

itemPicture.addEventListener("mousemove", function(e) {
  const containerRect = itemPicture.getBoundingClientRect();
  
  const xPos = (e.clientX - containerRect.left) / containerRect.width;
  const yPos = (e.clientY - containerRect.top) / containerRect.height;

  const xScale = 2;
  const yScale = 2;
  
  // Calculate distance from mouse to each edge of container
  const distTop = yPos * containerRect.height;
  const distBottom = (1 - yPos) * containerRect.height;
  const distLeft = xPos * containerRect.width;
  const distRight = (1 - xPos) * containerRect.width;
  
  // Calculate translation values
  const xTrans = distLeft - distRight;
  const yTrans = distTop - distBottom;
  
  itemPicture.style.transform = `scale(${xScale}, ${yScale}) translate(${xTrans}px, ${yTrans}px)`;
})

itemPicture.addEventListener("mouseout", function() {
  itemPicture.style.transform = "scale(1) translate(0, 0)";
});

itemPicture1.addEventListener("mouseover", () => {
  itemPicture.src = "img/sunscreen.jpg"
})
itemPicture2.addEventListener("mouseover", () => {
  itemPicture.src = "img/Product/cerave.png"
})
itemPicture3.addEventListener("mouseover", () => {
  itemPicture.src = "img/Product/ceta.jpg"
})
itemPicture4.addEventListener("mouseover", () => {
  itemPicture.src = "img/Product/elvicto.jpg"
})