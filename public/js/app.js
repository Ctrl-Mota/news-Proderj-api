

var app = new Vue({
  el: '#main',
  delimiters: ['<%', '%>'],
  data: {
    message: 'Hello Vue!',
    url: 'http://127.0.0.1:8000/api/',
    news: [],
    data: {
      title: '',
      summary: '',
      content: '',
      file: null,
      _token: null
    }
  },
  computed:{
  },
  create () {
  },
  mounted() {
    this.data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  },
  methods:{
    processFile(event) {
      this.data.file = event.target.files[0]
      console.log(this.$refs.inputFile.files)
    },
    submit () {
      const data = new FormData();
      data.append('file', this.data.file);
      const json = JSON.stringify({
        title: this.data.title,
        summary: this.data.summary,
        content: this.data.content,
        _token: this.data._token
      });
      data.append('data', json);
      
      fetch(this.url + 'news', { 
        method: 'POST', 
        body: data,
        'Content-Type': 'multipart/form-data, boundary=—-WebKitFormBoundaryfgtsKTYLsT7PNUVD'
      })
      .then(data => {
        alert('Salvo com sucesso!')
        this.clearFields()
      })
      .catch($e => {
        alert('Algo deu errado!')
        console.log($e)
      })
    },
    clearFields(){
      this.data.title = ''
      this.data.summary = ''
      this.data.content = ''
      this.data.file = null
      this.data._token = null
      this.$refs.inputFile.files.length = 0
    }
  }
})