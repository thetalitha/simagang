import { createRoot } from 'react-dom/client';
import MentorRoomPage from './pages/MentorRoomPage.jsx';

const el = document.getElementById('mentor-room-page');
if (el) createRoot(el).render(<MentorRoomPage />);
