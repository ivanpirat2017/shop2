export function mask(mask, text, textnonum = false) {
    let count = 0
    let num;
    if (textnonum) {
        num = text;
    }
    else {
        num = text.replace(/\D+/g, "")
    }

    let testdata = mask.split("")
    let arrtext = [];
    for (let i = 0; i < testdata.length; i++) {
        if (num[count] == null) {
            break;
        } else {
            if (testdata[i] == 'x') {
                arrtext.push(num[count])
                count++
            }
            else {
                arrtext.push(testdata[i])
            }
        }
    }
    const obj = {
        numder: num,
        text: arrtext.join('')
    }
    return obj;
}
