const dir = './components'
const files = [

  'input-parent',
  'small-input',
  'editable'

]

export default function (Vue) {
  files.forEach(filename => {
    Vue.component(`${filename}`, require(`${dir}/${filename}.vue`))
  })
}