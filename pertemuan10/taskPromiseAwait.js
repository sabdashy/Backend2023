/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */

function showDownload(result) {
    console.log("Download selesai");
    console.log("Hasil Download: " + result);
  }
  
  /**
   * Fungsi untuk download file
   * @param {function} callback - Function callback show
   */
const download = () => {
    return new Promise((resolve) => {
      setTimeout(() => {
        const result = "windows-10.exe"
        resolve(result)
        }, 3000);
    });
};

const main = async () => {
  // Memanggil metode promise tetapi asyncnya harus dihapus
  // download()
  //   .then(result => {
  //     showDownload(result);
  //   });

  // Memanggil metode async await
  const result = await download();
        showDownload(result);
};

main()
  
  /**
   * TODO:
   * - Refactor callback ke Promise atau Async Await
   * - Refactor function ke ES6 Arrow Function
   * - Refactor string ke ES6 Template Literals
   */