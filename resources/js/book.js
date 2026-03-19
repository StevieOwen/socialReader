let selectedText = "";
let range = null;

document.addEventListener("mouseup", function (e) {
    const selection = window.getSelection();

    if (selection.toString().length > 0) {
        selectedText = selection.toString();
        range = selection.getRangeAt(0);

        const rect = range.getBoundingClientRect();

        const popup = document.getElementById("comment-popup");
        popup.style.display = "block";
        popup.style.top = (window.scrollY + rect.top - 40) + "px";
        popup.style.left = (rect.left) + "px";
    }
});

document.getElementById("add-comment-btn").onclick = function () {
    const box = document.getElementById("comment-box");
    const popup = document.getElementById("comment-popup");

    popup.style.display = "none";

    const rect = range.getBoundingClientRect();

    box.style.display = "block";
    box.style.top = (window.scrollY + rect.bottom + 10) + "px";
    box.style.left = rect.left + "px";
};

document.getElementById("cancel-comment").onclick = function () {
    document.getElementById("comment-box").style.display = "none";
};

document.getElementById("save-comment").onclick = function () {
    if (!range) return;

    // Wrap selected text in highlight
    const span = document.createElement("span");
    span.className = "highlighted-text";
    span.style.background = "#BDDBF7";

    range.surroundContents(span);

    document.getElementById("comment-box").style.display = "none";
    window.getSelection().removeAllRanges();
};
