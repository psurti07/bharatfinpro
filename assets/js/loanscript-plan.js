class Slider {
  constructor(rangeElement, valueElement, emiElement, options) {
    this.rangeElement = rangeElement
    this.valueElement = valueElement
    this.emiElement = emiElement
    this.options = options

    // Attach a listener to "change" event
    this.rangeElement.addEventListener('input', this.updateSlider.bind(this))
  }

  // Initialize the slider
  init() {
    this.rangeElement.setAttribute('min', options.min)
    this.rangeElement.setAttribute('max', options.max)
    this.rangeElement.value = options.cur

    this.updateSlider()
  }

  // Format the money
  asMoney(value) {
    return '₹' + parseFloat(value)
      .toLocaleString('en-IN', { maximumFractionDigits: 2 })
  }

  generateBackground(rangeElement) {   
    if (this.rangeElement.value === this.options.min) {
      return
    }

    let percentage =  (this.rangeElement.value - this.options.min) / (this.options.max - this.options.min) * 100
    return 'background: linear-gradient(to right, #4EC350, #4EC350 ' + percentage + '%, #E2E8F0 ' + percentage + '%, #E2E8F0 100%)'
  }

  updateSlider (newValue) {
    this.valueElement.innerHTML = this.asMoney(this.rangeElement.value)
    this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    
    let j = Math.abs(this.rangeElement.value)
    let v = Math.abs(11.5 / 12 / 100)
    let Q = 72 
    //let amt = Math.pow(1 + v, Q - 1) / (Math.pow(1 + v, Q) - 1) * v * j
    let amt = Math.pow(1 + v, Q) / (Math.pow(1 + v, Q) - 1) * v * j

    this.emiElement.innerHTML = this.asMoney(Math.round(amt))
  }
}
/* themekey:MFhLbjhuYTNZaHhMQ1lZTnk1UFBBQW5xLy9ZQUM1Ny9xMmRwendhTGNCZz0=*/
let rangeElement = document.querySelector('.range [type="range"]')
let valueElement = document.querySelector('.range .range__value span') 
let emiElement = document.querySelector('.range .range__emi span')

let options = {
  min: 10000,
  max: 1500000,
  cur: 100000
}

if (rangeElement) {
  let slider = new Slider(rangeElement, valueElement, emiElement, options)
  slider.init()
}