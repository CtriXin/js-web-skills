var ffi = require('../../')

var libcrc = ffi.Library('./libcrc', {
	'crc_cal_by_byte': [ 'int', [ 'pointer','int' ] ],
	'crc_ccitt': [ 'int', [ 'pointer','int' ] ]
})

// if (process.argv.length < 3) {
//   console.log('Arguments: ' + process.argv[0] + ' ' + process.argv[1] + ' <max>')
//   process.exit()
// }
var input = new Buffer( [ 0x00,0x00,0x02,0x01,0x00 ] );
// var input = new Buffer( [ 0x00,0x00,0x01,0x6f] );
// var output = libcrc.crc_cal_by_byte(input,input.length);
var output = libcrc.crc_ccitt(input,input.length);
var c = new Buffer([0x4C,0x5D]);
console.log('Your output: ' + output)
var o = new Buffer([output >> 8, output & 0xFF]);
console.log('output:', output, o.toString('hex'));
console.log("(correct is)", 0x4C5D, c.toString('hex'));