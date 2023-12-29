// TODO 3: Import data students dari folder data/students.js
const students = require("../data/students")
const Student = require("../models/Student")

// Membuat Class StudentController
class StudentController {
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();  

      // TODO 4: Tampilkan data students
        const data = {
            message: "Menampilkan semua students",
            data: [students],
        };
        res.json(data);
    }
  
    async store(req, res) {
      /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    try {
        const newStudent = await Student.create(req.body);

        const data = {
            message: `Menambahkan data student: ${nama}`,
            data: [students],
        };
        res.json(data);
        } catch (error) {
          console.error(error);
          res.status(500).json({ message: "Terjadi kesalahan pada server" });
      }
    }
  
    update(req, res) {
      // TODO 6: Update data students
        const { id } = req.params;
        const { nama } = req.body;
        students[id] = nama;

        const data = {
            message: `Mengedit student id ${id}, nama ${nama}`,
            data: [students],
        };
        res.json(data);
    }
  
    destroy(req, res) {
      // TODO 7: Hapus data students
        const { id } = req.params;
        students.splice(id, 1);

        const data = {
            message: `Menghapus student id ${id}`,
            data: [students],
        };
        res.json(data);
    }
  }
  
// Membuat object StudentController
const object = new StudentController();
  
// Export object StudentController
module.exports = object;