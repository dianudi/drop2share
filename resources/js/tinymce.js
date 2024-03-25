import tinymce from "tinymce/tinymce";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/icons/default/icons";
import "tinymce/themes/silver/theme";
import "tinymce/models/dom/model";
import "tinymce/plugins/table";
import "tinymce/plugins/autolink";
import "tinymce/plugins/autosave";
import "tinymce/plugins/lists";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/anchor";
import "tinymce/plugins/link";

window.addEventListener("DOMContentLoaded", async () => {
    tinymce.init({
        selector: "#editor",
        skin: false,
        content_css: false,
        plugins: [
            "table",
            "autosave",
            "autolink",
            "lists",
            "searchreplace",
            "anchor",
            "link",
        ],
        toolbar:
            "undo redo | blocks | bold italic | link anchor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | searchreplace",
        license_key: "gpl",
        height: 500,
    });
});

document.querySelector(".page-submit").addEventListener("click", () => {
    document.querySelector(".page-form-submit").submit();
});

// Prevent Bootstrap dialog from blocking focusin
document.addEventListener("focusin", (e) => {
    if (
        e.target.closest(
            ".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
        ) !== null
    ) {
        e.stopImmediatePropagation();
    }
});
