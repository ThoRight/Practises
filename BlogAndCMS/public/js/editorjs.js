// Initialize Editor.js
const editor = new EditorJS({
    holder: 'editor',
    tools: {
        header: {
            class: Header,
            inlineToolbar: ['link'],
            config: {
                placeholder: 'Enter a header',
            },
            shortcut: 'CMD+SHIFT+H'
        },
        list: {
            class: List,
            inlineToolbar: true,
        },
        paragraph: {
            class: Paragraph,
            inlineToolbar: true,
        },
        embed: {
            class: Embed,
            config: {
                services: {
                    youtube: true,
                    coub: true,
                    // Other services you want to enable
                }
            }
        },
        image: {
            class: ImageTool, // Assuming you're using the Image Tool plugin
            config: {
                endpoints: {
                    byFile: appURL + 'api/upload_image.php', // Optional for uploading images
                    byUrl: appURL + 'api/upload_image_url.php' // Optional for fetching images by URL
                }
            }
        }
    },
    autofocus: true,

});