// TODO 3: Import data students dari folder data/students.js
const Student = require("../models/Student")

// Membuat Class StudentController
class StudentController {
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();  

    // TODO 4: Tampilkan data students
    if (students.length > 0) {
      const data = {
          message: "Menampilkan semua students",
          data: [students],
      };
      res.status(200).json(data);
    }
    else {
      const data = {
        message: "Students is empty",
      };
      res.status(200).json(data);
    }
  }
  
  async store(req, res) {
      /**
     * Validasi sederhana
     * - Handle jika salah satu data tidak dikirim
     */
      
      // destructing object req.body
    const { nama, nim, email, jurusan } = req.body;
    
    // Jika data undefined maka kirim response error
    if (!nama || !nim || !email || !jurusan) {
      const data = {
        message: `Semua data harus dikirim`,
      };
      return res.status(422).json(data);
    }
    // else
    const student = await Student.create(req.body);
    const data = {
      message: `Menambahkan data student`,
      data: student,
    };
    return res.status(422).json(data);
  }
  
    async update(req, res) {
      // TODO 6: Update data students
      const { id } = req.params;
      // cari id student yang ingin diupdate
      const student = await Student.find(id);

      if (student) {
        // Melakukan update data
        const student = await Student.update(id, req.body);
        const data = {
            message: `Mengedit student`,
            data: student,
        };
        res.status(200).json(data);
      }
      else {
        const data = {
          message: "Student not found"
        };
        res.status(404).json(data);
      }

    }
  
    async destroy(req, res) {
      // TODO 7: Hapus data students
      const { id } = req.params;
      const student = await Student.find(id);

      if (student) {
        await Student.delete(id);
        const data = {
          message: "Menghapus data students",
        };
        res.status(200).json(data);
      } else {
        const data = {
          message: "Student not found",
        };
        res.status(404).json(data);
      }
    }
  
  async show(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: "Menampilkan detail students",
        data: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };
      res.status(404).json(data);
    }
  }
}
  
// Membuat object StudentController
const object = new StudentController();
  
// Export object StudentController
module.exports = object;