import React, { useState } from 'react';
import { Plus, Users, BookOpen, CheckSquare, Calendar, X, Eye } from 'lucide-react';
import '../../css/mentorRoom.css'; // optional, kalau mau styling custom

export default function MentorRoomPage() {
  const [activeTab, setActiveTab] = useState('overview');
  const [showAddTaskModal, setShowAddTaskModal] = useState(false);
  const [showSubmissionModal, setShowSubmissionModal] = useState(false);
  const [selectedTask, setSelectedTask] = useState(null);
  
  const [newTask, setNewTask] = useState({
    title: '',
    description: '',
    deadline: '',
    points: ''
  });

  const roomData = {
    id: 1,
    name: 'Web Development Bootcamp',
    code: 'WEB2024',
    description: 'Belajar pembuatan website dari dasar hingga mahir',
    mentor: 'John Doe'
  };

  const [participants] = useState([
    { id: 1, name: 'Alice Johnson', email: 'alice@example.com', joinedAt: '2024-01-15', tasksCompleted: 8, totalTasks: 10 },
    { id: 2, name: 'Bob Smith', email: 'bob@example.com', joinedAt: '2024-01-16', tasksCompleted: 6, totalTasks: 10 },
    { id: 3, name: 'Charlie Brown', email: 'charlie@example.com', joinedAt: '2024-01-17', tasksCompleted: 9, totalTasks: 10 },
    { id: 4, name: 'Diana Prince', email: 'diana@example.com', joinedAt: '2024-01-18', tasksCompleted: 7, totalTasks: 10 }
  ]);

  const [materials] = useState([
    { id: 1, title: 'Pengenalan HTML & CSS', type: 'PDF', uploadedAt: '2024-01-10', size: '2.5 MB' },
    { id: 2, title: 'JavaScript Fundamentals', type: 'Video', uploadedAt: '2024-01-12', size: '150 MB' },
    { id: 3, title: 'React Basics', type: 'PDF', uploadedAt: '2024-01-15', size: '3.2 MB' },
    { id: 4, title: 'Project Structure Guide', type: 'Document', uploadedAt: '2024-01-18', size: '1.8 MB' }
  ]);

  const [tasks, setTasks] = useState([
    {
      id: 1,
      title: 'Membuat Landing Page',
      description: 'Buat landing page sederhana dengan HTML dan CSS',
      deadline: '2024-02-01',
      points: 100,
      submissions: [
        { studentId: 1, studentName: 'Alice Johnson', submittedAt: '2024-01-30', status: 'reviewed', score: 95 },
        { studentId: 2, studentName: 'Bob Smith', submittedAt: '2024-02-01', status: 'pending', score: null },
        { studentId: 3, studentName: 'Charlie Brown', submittedAt: '2024-01-29', status: 'reviewed', score: 88 }
      ]
    },
    {
      id: 2,
      title: 'JavaScript Calculator',
      description: 'Implementasi kalkulator sederhana dengan JavaScript',
      deadline: '2024-02-05',
      points: 150,
      submissions: [
        { studentId: 1, studentName: 'Alice Johnson', submittedAt: '2024-02-04', status: 'reviewed', score: 92 },
        { studentId: 3, studentName: 'Charlie Brown', submittedAt: '2024-02-05', status: 'pending', score: null }
      ]
    },
    {
      id: 3,
      title: 'React Todo App',
      description: 'Buat aplikasi todo list dengan React',
      deadline: '2024-02-10',
      points: 200,
      submissions: []
    }
  ]);

  const handleAddTask = () => {
    if (newTask.title && newTask.deadline) {
      const task = {
        id: tasks.length + 1,
        ...newTask,
        points: parseInt(newTask.points) || 0,
        submissions: []
      };
      setTasks([...tasks, task]);
      setNewTask({ title: '', description: '', deadline: '', points: '' });
      setShowAddTaskModal(false);
    }
  };

  const viewSubmissions = (task) => {
    setSelectedTask(task);
    setShowSubmissionModal(true);
  };

  return (
    <div className="min-h-screen bg-gray-50">
      {/* seluruh isi React kamu (yang panjang itu) tempel di sini persis */}
    </div>
  );
}
