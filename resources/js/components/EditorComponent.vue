<template>
   <div>
       <mavon-editor v-model="editor_value" :ishljs = "true"  ref=md  @imgAdd="$imgAdd" @imgDel="$imgDel"/>
       <textarea  v-model="editor_value" name="editor_value"></textarea>

       <!--<div class="markdown-body"-->
            <!--v-html="compiledMarkdown"/>-->
      <!--</div>-->
   </div>
</template>

<script>
    import marked from 'marked'
    import hljs from 'highlight.js'
    import 'highlight.js/styles/default.css'
    marked.setOptions({
        renderer: new marked.Renderer(),
        gfm: true,
        tables: true,
        breaks: false,
        pedantic: false,
        sanitize: false,
        smartLists: true,
        smartypants: false,
        highlight: function (code, lang) {
            if (lang && hljs.getLanguage(lang)) {
                return hljs.highlight(lang, code, true).value;
            } else {
                return hljs.highlightAuto(code).value;
            }
        }
    });
    export default {
        props: ['content'],
        "name":'app',
        data(){
            return {
                editor_value:'',
            }
        },
        methods: {
            // 绑定@imgAdd event
            $imgAdd(pos, $file){
                // 第一步.将图片上传到服务器.
                var formdata = new FormData();
                var $vm=this;
                formdata.append('image', $file);
                axios({
                    url: '/upload/uploadImages',
                    method: 'post',
                    data: formdata,
                    headers: { 'Content-Type': 'multipart/form-data' },
                }).then((url) => {
                    // 第二步.将返回的url替换到文本原位置![...](0) -> ![...](url)
                    // $vm.$img2Url 详情见本页末尾
                    $vm.$refs.md.$img2Url(pos, '/storage/'+url.data.url);
                    $vm.img_file[pos] =$file;
                    console.log(url.data.url,$vm.img_file);
                })
            },
            $imgDel(pos){

                console.log(this.img_file[pos])
            },
        },
        computed: {
            compiledMarkdown() {
                return marked(this.editor_value || '', {
                    sanitize: true
                });
            }
        },
        mounted() {
            this.editor_value=this.content
            console.log(this.editor_value)
        }
    }
</script>
